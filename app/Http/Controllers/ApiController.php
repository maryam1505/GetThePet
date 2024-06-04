<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PetProducts;
use App\Models\QuestionLikes;
use App\Models\QuestionReplies;
use App\Models\ReplyLikes;
use App\Models\User;
use App\Models\Users;
use App\Models\UsersFavourites;
use App\Models\UsersQuestions;
use App\Rules\PasswordValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    /*======================= Web Panel =============================*/
    public function user_register(Request $request) {
        $request->validate(
            [
                'email'     => 'required|email|unique:users,email',
                'password'  => ['required', 'min:8', 'max:12', 'confirmed', new PasswordValidation()],
                'username'  => 'required|string|max:255',
            ],
            [
                'email.required'    => 'The email field is required.',
                'email.email'       => 'Please enter a valid email address.',
                'email.unique'      => 'This email is already registered.',
                'password.required' => 'The password field is required.',
                'password.min'      => 'Password must be at least 8 characters long.',
                'password.max'      => 'Password cannot be more than 12 characters long.',
                'password.regex'    => 'Password must contain at least one special character.',
                'username.required' => 'The username field is required.',
                'username.string'   => 'The username must be a string.',
                'username.max'      => 'The username cannot be more than 255 characters long.',
            ],
        );
        User::create([
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'username'  => $request->username,
        ]);

        return redirect()->route('login')->with('success', 'Your account has been registered successfully!');
    }
    public function user_login(Request $request) {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:8|max:12',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not Found');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with('error', 'Password Incorrect');
        }

        if($user->status == 'Active') {
            Session::put('users_data', [
                'user_id'       => $user->users_customers_id,
                'username'      => $user->username,
                'user_image'    => $user->image,
                'user_email'    => $user->email,
            ]);
            return redirect()->route('home')->with(['title'=>'Home', 'success' => 'Logged In successfully!']);
        } else {
            return redirect()->route('home')->with(['title'=>'Home', 'error' => 'Oops your account is ' . $user->status]);
        }
    }

    public function logout(Request $request) {
        $role = $request->role;
        if ($role == 'Admin') {
            Session::forget('admin_data');
            return redirect()->route('admin.login');
        } else {
            Session::forget('users_data');
            return redirect()->route('home');
        }
    }
    /*======================= Web Panel =============================*/

    /*======================= ADMIN Panel =============================*/
    public function Admin_register(Request $request) {
        $request->validate(
            [
                'email'     => 'required|email|unique:users,email',
                'password'  => ['required', 'min:8', 'max:12', new PasswordValidation()],
                'name'      => 'required|string|max:255',
            ],
            [
                'email.required'    => 'The email field is required.',
                'email.email'       => 'Please enter a valid email address.',
                'email.unique'      => 'This email is already registered.',
                'password.required' => 'The password field is required.',
                'password.min'      => 'Password must be at least 8 characters long.',
                'password.max'      => 'Password cannot be more than 12 characters long.',
                'password.regex'    => 'Password must contain at least one special character.',
                'name.required'     => 'The name field is required.',
                'name.string'       => 'The name must be a string.',
                'name.max'          => 'The name cannot be more than 255 characters long.',
            ],
        );
        Admin::create([
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'name'      => $request->name,
        ]);

        return redirect()->route('admin.login')->with('success', 'Your account has been registered successfully!');
    }
    public function Admin_login(Request $request) {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:8|max:12',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin) {
            return redirect()->route('admin.login')->with('error', 'User not Found');
        }
        if(!Hash::check($request->password, $admin->password)) {
            return redirect()->route('admin.login')->with('error', 'Password Incorrect');
        }
        Session::put('admin_data', [
            'id' => $admin->administrations_id,
            'role' => $admin->role,
            'name' => $admin->name,
            'image' => $admin->image,
        ]);
        return redirect()->route('dashboard');
    }
    /*======================= ADMIN Panel =============================*/

    /*======================= APIs =============================*/
    public function Add_Favourites(Request $request) {
        $user_id    = $request->input('users_customers_id');
        $product_id = $request->input('pet_shop_products_id');
        $status     = $request->input('status');

        $user       = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'User Not found',
            ], 404);
        }
    
        $product    = PetProducts::find($product_id);
        if(!$product) {
            return response()->json([
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'Product Not found',
            ], 404);
        }

        if($status == 'Liked') {
            $existing_favorite = UsersFavourites::where('users_customers_id', $user_id)->where('pet_shop_products_id', $product_id)->where('status','Liked')->first();
    
            if($existing_favorite) {
                $fav_product = $existing_favorite->pet_shop_products_id;
                $product = PetProducts::find( $fav_product );
                return response()->json(
                    [
                        'status' => 'error',
                        'code' => 409,
                        'message' => 'Product is already in favorites',
                    ],
                    409,
                );
            }
        
            $favorite = new UsersFavourites;
            $favorite->users_customers_id = $user_id;
            $favorite->pet_shop_products_id = $product_id;
            $favorite->status = $status;
            $favorite->created_at = now();
            
            if($favorite->save()) {
                $fav_product = $favorite->pet_shop_products_id;
                $product = PetProducts::find( $fav_product );
                return response()->json([
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'Product added to favorites successfully',
                    'data'      => $product,
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'code'      => 500,
                    'message'   => 'Failed to add product to favorites',
                ], 500);
            }
        } else if($status == 'Unliked') {
            $existing_favorite = UsersFavourites::where('users_customers_id', $user_id)->where('pet_shop_products_id', $product_id)->where('status','Unliked')->first();
    
            if($existing_favorite) {
                $fav_product = $existing_favorite->pet_shop_products_id;
                $product = PetProducts::find( $fav_product );
                return response()->json(
                    [
                        'status'    => 'error',
                        'code'      => 409,
                        'message'   => 'Product is not in favourites',
                        'data'      => $product,
                    ],
                    409,
                );
            }
            $favorite = UsersFavourites::where('users_customers_id',$user_id)->where('pet_shop_products_id',$product_id)->update(['status' => $status]);
            
            if($favorite) {
                return response()->json([
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'Product removed from favorites successfully',
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'code'      => 500,
                    'message'   => 'Failed to remove product from favorites',
                ], 500);
            }
        } else {
            return response()->json(
                [
                    'status'    => 'error',
                    'code'      => 400,
                    'message'   => 'Status not found',
                ],
                400,
            );
        }
    }

    public function question_likes(Request $request) {
        $user_id        = $request->input('users_customers_id');
        $question_id    = $request->input('users_questions_id');
        $status         = $request->input('status');
        $user           = User::find($user_id);
        $question       = UsersQuestions::where('users_questions_id',$question_id)->first();

        if(!$user) {
            return response()->json([
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'User Not found',
            ], 404);
        }

        if(!$question) {
            return response()->json([
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'Question Not found',
            ], 404);
        }

        $existing_like = QuestionLikes::where('users_customers_id', $user_id)->where('users_questions_id', $question_id)->first();
        if($status == 'Liked') {
            if(!empty($existing_like)) {
                if($existing_like->status == 'Liked') {
                    return response()->json([
                            'status' => 'error',
                            'code' => 409,
                            'message' => 'Question is already Liked',
                        ], 
                        409,
                    );
                } else {
                    $update = QuestionLikes::where('users_questions_id', $question_id)->where('users_customers_id', $user_id)->update(['status'=>$status]);
                    if($update) {
                        return response()->json([
                            'status'    => 'success',
                            'code'      => 200,
                            'message'   => 'Status updated',
                        ], 200);
                    } else {
                        return response()->json([
                            'status'    => 'error',
                            'code'      => 400,
                            'message'   => 'Something went wrong!',
                        ], 400);
                    }
                }
            }

            $done = QuestionLikes::create([
                'users_customers_id'    => $user_id,
                'users_questions_id'    => $question_id,
                'status'                => $status,
                'created_at'            => now(),
            ]);

            if($done) {
                return response()->json([
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'Question Liked Successfully',
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'code'      => 500,
                    'message'   => 'Failed to like',
                ], 500);
            }
        } else if($status == 'Unliked') {
            if($existing_like) { 
                $like_status = $existing_like->status;
                if($like_status == 'Liked') {
                    $update = QuestionLikes::where('users_questions_id', $question_id)->where('users_customers_id', $user_id)->update(['status'=> $status]);
                    if($update) {
                        return response()->json([
                            'status'    => 'success',
                            'code'      => 200,
                            'message'   => 'Status updated',
                        ], 200);
                    } else {
                        return response()->json([
                            'status'    => 'error',
                            'code'      => 400,
                            'message'   => 'Something went wrong!',
                        ], 400);
                    }
                } else if($like_status == 'Unliked') {
                    return response()->json([
                        'status'    => 'error',
                        'code'      => 409,
                        'message'   => 'Already unliked',
                    ], 409);
                }
            }
        } else {
            return response()->json([
                'status'    => 'error',
                'code'      => 400,
                'message'   => 'Status not found!',
            ], 400);
        }

    }

    public function reply_likes(Request $request) {
        $user_id    = $request->input('users_customers_id');
        $reply_id   = $request->input('question_replies_id');
        $status     = $request->input('status');
        $user       = User::find($user_id);
        $reply      = QuestionReplies::where('question_replies_id', $reply_id)->first();

        if(!$user) {
            return response()->json([
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'User Not found',
            ], 404);
        }

        if(!$reply) {
            return response()->json([
                'status'    => 'error',
                'code'      => 400,
                'message'   => 'Reply Not found',
            ], 400);
        }

        $existing_like = ReplyLikes::where('users_customers_id', $user_id)->where('question_replies_id', $reply_id)->first();
        if($status == 'Liked') {
            if(!empty($existing_like)) {
                if($existing_like->status == 'Liked') {
                    return response()->json([
                            'status' => 'error',
                            'code' => 409,
                            'message' => 'Reply is already Liked',
                        ], 
                        409,
                    );
                } else {
                    $update = ReplyLikes::where('question_replies_id', $reply_id)->where('users_customers_id', $user_id)->update(['status'=>'Liked']);
                    if($update) {
                        return response()->json([
                            'status'    => 'success',
                            'code'      => 200,
                            'message'   => 'Status updated',
                        ], 200);
                    } else {
                        return response()->json([
                            'status'    => 'error',
                            'code'      => 400,
                            'message'   => 'Something went wrong!',
                        ], 400);
                    }
                }
            }

            $done = ReplyLikes::create([
                'question_replies_id'    => $reply_id,
                'users_customers_id'    => $user_id,
                'status'                => $status,
                'created_at'            => now(),
            ]);

            if($done) {
                return response()->json([
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'Reply Liked Successfully',
                ], 200);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'code'      => 500,
                    'message'   => 'Failed to like',
                ], 500);
            }
        } else if($status == 'Unliked') {
            if($existing_like) { 
                $like_status = $existing_like->status;
                if($like_status == 'Liked') {
                    $update = ReplyLikes::where('question_replies_id', $reply_id)->where('users_customers_id', $user_id)->update(['status'=> $status]);
                    if($update) {
                        return response()->json([
                            'status'    => 'success',
                            'code'      => 200,
                            'message'   => 'Status updated',
                        ], 200);
                    } else {
                        return response()->json([
                            'status'    => 'error',
                            'code'      => 400,
                            'message'   => 'Something went wrong!',
                        ], 400);
                    }
                } else if($like_status == 'Unliked') {
                    return response()->json([
                        'status'    => 'error',
                        'code'      => 409,
                        'message'   => 'Already unliked',
                    ], 409);
                }
            }
        } else {
            return response()->json([
                'status'    => 'error',
                'code'      => 400,
                'message'   => 'Status not found!',
            ], 400);
        }

    }

    /*======================= APIs =============================*/
}
