<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\PetProducts;
use App\Models\QuestionLikes;
use App\Models\QuestionReplies;
use App\Models\ReplyLikes;
use App\Models\User;
// use App\Models\Users;
use App\Models\UsersCart;
use App\Models\UsersFavourites;
use App\Models\UsersOrders;
use App\Models\UsersQuestions;
use App\Rules\PasswordValidation;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller {
    public function login() {
        return view('users.login');
    }
    public function register() {
        return view('users.signup');
    }

    public function forgot_password() {
        return view('users.forgot_password');
    }

    public function Verify_OTP(Request $request) {
        $email = $request->input('email');
        $verify_email = User::where("email",$email)->first();

        if($verify_email) {
            $otp = mt_rand(1000,9999);
            $mail_sent = Mail::to($email)->send(new OTPMail($otp));

            if($mail_sent) {
                User::where("email",$email)->update(["otp" => $otp]);
            }

            return view('users.verify_OTP')->with(['success'=>'OTP sent successfully','otp'=> $otp, 'email' => $email]);
        } else {
            return redirect()->route("forgot.password")->with("error","Email is not Registered");
        }
    }
    public function reset_password(Request $request) {
        $email = $request->input('email');
        $verify_email = User::where("email",$email)->first();

        if($verify_email) {
            $otp1 = $request->input('otp_1'); 
            $otp2 = $request->input('otp_2');
            $otp3 = $request->input('otp_3');
            $otp4 = $request->input('otp_4');
            $combined_otp = $otp1 . $otp2 . $otp3 . $otp4;

            if($combined_otp == $verify_email->otp) {
                return view('users.reset_password')->with(['success'=> 'OTP verified! Reset your password.', 'email' => $email]);
            } else {
                return redirect()->route('verify.otp')->with('error','Oops! OTP do not matched!');
            }

        } else {
            return redirect()->route("reset.password")->with("error","Email is not Registered");
        }
    }

    public function update_password(Request $request) {
        $email = $request->input("email");
        $verify_email = User::where("email",$email)->first();
        if($verify_email) {
            $request->validate([
                'password'  => ['required', 'min:8', 'max:12', 'confirmed', new PasswordValidation()],
            ]);
            $password = Hash::make($request->input('password'));
            User::where("email",$email)->update(['password' => $password]);

            return redirect()->route('login')->with('success','Password Reset Successfully!');
        } else {
            return redirect()->route("reset.password")->with("error","Email is not Registered");
        }
    }

    public function index() {
        $products = PetProducts::all()->shuffle()->take(8);

        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }

        return view('users.index', [
            'title'         => 'Home',
            'products'      => $products,
            'cartCount'     => $cartCount,
            'favCount'      => $favCount,
        ]);
    }

    public function about() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.about', ['title' => 'About', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }

    public function marketplace() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.marketplace', ['title' => 'Marketplace', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    
    public function pharmacy() {
        $cartCount  = 0;
        $favCount   = 0;
        $user_id  = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->where('status', 'Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        $fav_products_cat = PetProducts::whereIn('pet_shop_products_id', function($query) {
            $query->select('pet_shop_products_id')
                  ->from('liked_products')
                  ->where('status', 'Liked')
                  ->distinct();
        })->where('category', 'pharmacy')->get();
        $liked_products = PetProducts::whereIn('pet_shop_products_id', function($query) use ($user_id) {
            $query->select('pet_shop_products_id')
                  ->from('liked_products')
                  ->where('users_customers_id', $user_id)
                  ->where('status', 'Liked');
        })->where('category', 'pharmacy')->get();
        $products = PetProducts::where('category', 'pharmacy')->get();
        return view('users.pharmacy', ['title' => 'Pharmacy', 'products' => $products, 'cartCount' => $cartCount, 'favCount' => $favCount, 'wanted' =>  $fav_products_cat, 'liked_products' => $liked_products]);
    }

    public function accessories_food() {
        $cartCount = 0;
        $favCount  = 0;
        $user_id  = 0;

        if(session()->has('users_data')) {
            $user_id    = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->where('status', 'Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }

        $products       = PetProducts::whereIn('category', ['Food', 'Accessories'])->get();
        $liked_products = PetProducts::whereIn('pet_shop_products_id', function($query) use ($user_id) {
            $query->select('pet_shop_products_id')
                  ->from('liked_products')
                  ->where('users_customers_id', $user_id)
                  ->where('status', 'Liked');
        })->whereIn('category', ['Food', 'Accessories'])->get();
        $fav_products_cat = PetProducts::whereIn('pet_shop_products_id', function($query) {
            $query->select('pet_shop_products_id')
                  ->from('liked_products')
                  ->where('status', 'Liked')
                  ->distinct();
        })->whereIn('category', ['Food', 'Accessories'])->get();
        return view('users.accessories_food', ['title' => 'Accessories Food', 'products' => $products, 'cartCount' => $cartCount, 'favCount' => $favCount, 'wanted' =>  $fav_products_cat, 'liked_products'=> $liked_products]);
    }

    public function discussion_forum() {
        $cartCount = 0;
        $favCount   = 0;
        $user_id = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        $questions = UsersQuestions::with(['user', 'replies.user'])
                           ->orderBy('created_at', 'desc')
                           ->get();
        foreach ($questions as $question) {
            $question->user_data    = $question->user->toArray();
            $question->reply_count  = $question->replyCount();
            $question->time_ago     = Carbon::parse($question->created_at)->diffForHumans(); 
            $question->likes        = $question->likesCount();
            
            foreach ($question->replies as $reply) {
                $reply->replier_data = $reply->user->toArray();
                $reply->time_ago = Carbon::parse($reply->created_at)->diffForHumans();
                $reply->likes = $reply->likesCount();
            }
        }
        $liked_questions    = QuestionLikes::where('users_customers_id',$user_id)->where('status','Liked')->get();
        $liked_replies      = ReplyLikes::where('users_customers_id',$user_id)->where('status','Liked')->get();
        return view('users.discussion_forum', [
            'title' => 'Discussion Forum', 
            'cartCount' => $cartCount, 
            'favCount' => $favCount,
            'questions'=> $questions,
            'liked_questions'=> $liked_questions,
            'liked_reply'=> $liked_replies,
        ]);
    }

    public function ask_question(Request $request) {
        $id = Session::get('users_data')['user_id'];
        $user = User::where('users_customers_id',$id)->where('status','Active')->first();
        if($user) {
            $question = $request->input('question');
            $save = UsersQuestions::create([
                        'users_customers_id' => $id,
                        'question' => $question,
                        'created_at' => now(),
                    ]);
            if($save) {
                return redirect()->route('discussion.forum')->with('success','Your question is published!');
            } else {
                return redirect()->route('discussion.forum')->with('error','Oops! Something went wrong!');
            }       
        } else {
            return redirect()->route('discussion.forum')->with('error','Your account is not active!');
        }
    }

    public function send_reply(Request $request) {
        $id = Session::get('users_data')['user_id'];
        $user = User::where('users_customers_id',$id)->where('status','Active')->first();
        if($user) {
            $reply = $request->input('reply');
            $question_id = $request->input('question_id');
            $save = QuestionReplies::create([
                'users_customers_id' => $id,
                'users_questions_id' => $question_id,
                'reply' => $reply,
                'created_at' => now(),
            ]); 
            if($save) {
                return redirect()->route('discussion.forum')->with('success','Your reply is published!');
            } else {
                return redirect()->route('discussion.forum')->with('error','Oops! Something went wrong!');
            } 
        } else {
            return redirect()->route('discussion.forum')->with('error','Your account is not active!');
        }  
    }

    public function pet_history() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.pet_history', ['title' => 'Pet History', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    public function product_details($id) {
        $cartCount          = 0;
        $favCount           = 0;
        $cart_product_ids   = [];
        $user_id = null;

        if(session()->has('users_data')) {
            $user_id            = session('users_data')['user_id'];
            $cartCount          = UsersCart::where('users_customers_id', $user_id)->where('status', 'Stored')->count();
            $favCount           = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
            $cart_product_ids   = UsersCart::where('users_customers_id', $user_id)->where('status', 'Stored')->pluck('pet_shop_products_id')->toArray();
        }

        $product = PetProducts::find($id);
        if(!$product) {
            return redirect()->route('home')->with('error', 'Product Not Found');
        }
        $category = $product->category;
        $related_products = PetProducts::where('category', $category)
                                    ->where('pet_shop_products_id', '!=', $id)
                                    ->get();

        $return_data = [
            'title' => 'Product Details',
            'product' => $product,
            'cartCount' => $cartCount,
            'favCount' => $favCount,
            'cart_product_ids' => $cart_product_ids,
            'related_products' => $related_products,
            'liked_products' => collect(), // Initialize liked_products as an empty collection
        ];
    
        if ($user_id) {
            $liked_products = PetProducts::whereIn('pet_shop_products_id', function ($query) use ($user_id) {
                $query->select('pet_shop_products_id')
                        ->from('liked_products')
                        ->where('users_customers_id', $user_id)
                        ->where('status', 'Liked');
            })->where('category', $category)->get();
            $return_data['liked_products'] = $liked_products;
        }

        return view('users.product_details', $return_data);
    }
    public function show_cart() {
        $cartCount  = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id    = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        
            $cart_products      = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->get(['pet_shop_products_id', 'quantity']);
            $product_ids        = $cart_products->pluck('pet_shop_products_id')->toArray();
            $user_products      = PetProducts::whereIn('pet_shop_products_id', $product_ids)->get();
            $product_quantities = [];

            foreach ($cart_products as $cart_product) {
                $product_quantities[$cart_product->pet_shop_products_id] = $cart_product->quantity;
            }
            foreach($user_products as $product) {
                $product->quantity = $product_quantities[$product->pet_shop_products_id] ?? 0;
            }
            
            return view('users.cart', [
                'title'             => 'Shopping Cart', 
                'user_products'     => $user_products, 
                'cartCount'         => $cartCount,
                'favCount'          => $favCount
            ]);
        } else {
            return Redirect::route('home')->with(['title' => 'Home', 'cartCount' => $cartCount, 'favCount' => $favCount]);
        }
    }
    public function add_cart(Request $request) {
        $cartCount = 0;
        $favCount   = 0;

        $user_id    = session('users_data')['user_id'];
        $cartCount  = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
        $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        $quantity   = $request->input('quantity');
        $id         = $request->input('product_id');

        $cart_product = UsersCart::where('users_customers_id',$user_id)->where('status','Stored')->where('pet_shop_products_id', $id)->first();

        if($cart_product) {
            return redirect()->route('cart')->with(['title' => 'Shopping Cart','error' =>'Item already in the cart','cartCount' => $cartCount, 'favCount' => $favCount]);
        } else {
            $addtocart                          = new UsersCart();
            $addtocart->pet_shop_products_id    = $id;
            $addtocart->quantity                = $quantity;
            $addtocart->users_customers_id      = $user_id;

            if($addtocart->save()) {
                $cart_products  = UsersCart::where('users_customers_id', $user_id)->where('status', 'Stored')->get(['pet_shop_products_id', 'quantity']);
                $product_ids    = $cart_products->pluck('pet_shop_products_id')->toArray();
                $user_products  = PetProducts::where('pet_shop_products_id', $product_ids)->get();

                $product_quantities = [];
                foreach($cart_products as $cart_product) {
                    $product_quantities[$cart_product->pet_shop_products_id]    = $cart_product->quantity;
                }

                foreach($user_products as $product) {
                    $product->quantity = $product_quantities[$product->pet_shop_products_id] ?? 0;
                }
                return redirect()->route('cart')->with(['title' => 'Shopping Cart', 'success'=>'Product added to the Cart Successfully','cartCount' => $cartCount, 'favCount' => $favCount]);
            } else {
                return redirect()->back()->with('error', 'Failed to add item to cart.');
            }
        } 
         

        
    }
    public function CheckOut(Request $request) {
        $cartCount = 0;
        $favCount   = 0;

        $user_id        = session('users_data')['user_id'];
        $cartCount      = UsersCart::where('users_customers_id', $user_id)->where('status', 'Stored')->count();
        $favCount       = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();

        $user_details   = User::where('users_customers_id', $user_id)->first();
        $total_price    = $request->input('total_price');
        $total_quantity = $request->input('total_quantity');
        return view('users.check_out', [
            'title'             => 'Check Out', 
            'cartCount'         => $cartCount, 
            'favCount'          => $favCount,
            'user_data'         => $user_details,
            'total_quantity'    => $total_quantity,
            'total_price'       => $total_price,
        ]);

    }
    public function thankyou(Request $request) {
        $cartCount = 0;
        $favCount   = 0;

        $user_id = session('users_data')['user_id'];
        $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
        $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();

        $first_name     = $request->input('first_name');
        $last_name      = $request->input('last_name');
        $username       = $request->input('username');
        $email          = $request->input('email');
        $phone_no       = $request->input('phone_no');
        $address        = $request->input('address');
        $total_amount        = $request->input('total_amount');
        $total_quantity        = $request->input('total_quantity');

        $update = User::where('users_customers_id', $user_id)->update([
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'username'      => $username,
            'email'         => $email,
            'phone_no'      => $phone_no,
            'address'       => $address
        ]);
        if($update) {
            $order_number = "ODR-" . Carbon::now()->format('ymd') . Str::random(4);
            UsersOrders::create([
                'users_customers_id' => $user_id,
                'order_number' => $order_number,
                'total_items' => $cartCount,
                'total_quantities' => $total_quantity,
                'total_amount' => $total_amount,
                'created_at' => now(),
            ]);

            UsersCart::where('users_customers_id', $user_id)->update(['status'=>'Ordered']);
        }
        $user_details   = User::where('users_customers_id', $user_id)->first();
        $user_order_details   = UsersOrders::where('users_customers_id', $user_id)->first();
        return view('users.thankyou', [
            'title'         => 'Thank You', 
            'cartCount'     => $cartCount, 
            'user_data'     => $user_details, 
            'favCount'      => $favCount,
            'order_details' => $user_order_details,
        ]);
        
    }
    public function contact_us() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->where('status','Stored')->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.contact', ['title' => 'Contact Us', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    public function delete($id) {
        $cartItem = UsersCart::where('pet_shop_products_id', $id)->first();
        if($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Cart item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart item not found.');
        }
    }
}
