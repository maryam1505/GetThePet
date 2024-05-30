<?php

namespace App\Http\Controllers;

use App\Models\PetProducts;
use App\Models\Users;
use App\Models\UsersCart;
use App\Models\UsersFavourites;
use App\Models\UsersOrders;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function login()
    {
        return view('users.login');
    }
    public function register()
    {
        return view('users.signup');
    }
    public function index() {
        $products = PetProducts::all()->shuffle()->take(8);

        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }

        return view('users.index', [
            'title'         => 'Home',
            'products'      => $products,
            'cartCount'     => $cartCount,
            'favCount'      => $favCount,
        ]);
    }
    public function pharmacy() {
        $cartCount  = 0;
        $favCount   = 0;
        $user_id  = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->count();
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
    public function about() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.about', ['title' => 'About', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    public function marketplace() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.marketplace', ['title' => 'Marketplace', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    public function accessories_food() {
        $cartCount = 0;
        $favCount  = 0;
        $user_id  = 0;

        if(session()->has('users_data')) {
            $user_id    = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->count();
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

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.discussion_forum', ['title' => 'Discussion Forum', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    public function pet_history() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        }
        return view('users.pet_history', ['title' => 'Pet History', 'cartCount' => $cartCount, 'favCount' => $favCount]);
    }
    public function product_details($id) {
        $cartCount          = 0;
        $favCount           = 0;
        $cart_product_ids   = [];

        if(session()->has('users_data')) {
            $user_id            = session('users_data')['user_id'];
            $cartCount          = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount           = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
            $cart_product_ids   = UsersCart::where('users_customers_id', $user_id)->pluck('pet_shop_products_id')->toArray();
        }

        $product = PetProducts::find($id);
        if(!$product) {
            return view('home', ['title'=> 'Home'])->with('error', 'Product Not Found');
        }
        return view('users.product_details', [
            'title'             => 'Product Details',
            'product'           => $product,
            'cartCount'         => $cartCount,
            'favCount'          => $favCount,
            'cart_product_ids'  => $cart_product_ids
        ]);
    }
    public function show_cart() {
        $cartCount  = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id    = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
        
            $cart_products      = UsersCart::where('users_customers_id', $user_id)->get(['pet_shop_products_id', 'quantity']);
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

        if(session()->has('users_data')) {
            $user_id    = session('users_data')['user_id'];
            $cartCount  = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();
            $quantity   = $request->input('quantity');
            $id         = $request->input('product_id');

            $cart_product = UsersCart::where('users_customers_id',$user_id)->where('pet_shop_products_id', $id)->first();

            if($cart_product) {
                return redirect()->route('cart')->with(['title' => 'Shopping Cart','error' =>'Item already in the cart']);
            } else {
                $price = PetProducts::where('pet_shop_products_id', $id)->pluck('price');
                $addtocart                          = new UsersCart();
                $addtocart->pet_shop_products_id    = $id;
                $addtocart->quantity                = $quantity;
                $addtocart->users_customers_id      = $user_id;
                $addtocart->subtotal                = $quantity * $price;
    
                if($addtocart->save()) {
                    $cart_products  = UsersCart::where('users_customers_id', $user_id)->get(['pet_shop_products_id', 'quantity']);
                    $product_ids    = $cart_products->pluck('pet_shop_products_id')->toArray();
                    $user_products  = PetProducts::where('pet_shop_products_id', $product_ids)->get();

                    $product_quantities = [];
                    $product_subtotal = [];
                    foreach($cart_products as $cart_product) {
                        $product_quantities[$cart_product->pet_shop_products_id]    = $cart_product->quantity;
                        $product_subtotal[$cart_product->pet_shop_products_id]      = $cart_product->subtotal;
                    }
    
                    foreach($user_products as $product) {
                        $product->quantity = $product_quantities[$product->pet_shop_products_id] ?? 0;
                        $product->subtotal = $product_subtotal[$product->pet_shop_products_id] ?? 0;
                    }
                    return redirect()->route('cart')->with(['title' => 'Shopping Cart', 'success'=>'Product added to the Cart Successfully']);
                } else {
                    return redirect()->back()->with('error', 'Failed to add item to cart.');
                }
            } 

        } else {
            return redirect()->route('home')->with(['title' => 'Home', 'cartCount' => $cartCount, 'favCount' => $favCount]);
        }
    }
    public function CheckOut(Request $request) {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id        = session('users_data')['user_id'];
            $cartCount      = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount       = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();

            $user_details   = Users::where('users_customers_id', $user_id)->first();
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
        } else {
            return Redirect::route('home')->with('title', 'Home');
        }
    }
    public function thankyou(Request $request) {
        $cartCount = 0;
        $favCount   = 0;
        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
            $favCount   = UsersFavourites::where('users_customers_id', $user_id)->where('status','Liked')->count();

            $first_name     = $request->input('first_name');
            $last_name      = $request->input('last_name');
            $username       = $request->input('username');
            $email          = $request->input('email');
            $phone_no       = $request->input('phone_no');
            $address        = $request->input('address');
            $total_amount        = $request->input('total_amount');
            $total_quantity        = $request->input('total_quantity');

            $update = Users::where('users_customers_id', $user_id)->update([
                'first_name'    => $first_name,
                'last_name'     => $last_name,
                'username'      => $username,
                'email'         => $email,
                'phone_no'      => $phone_no,
                'address'       => $address
            ]);
            if($update) {
                $order_number = "ORD-" . Carbon::now()->format('ymd') . Str::random(4);
                UsersOrders::create([
                    'users_customers_id' => $user_id,
                    'order_number' => $order_number,
                    'total_items' => $cartCount,
                    'total_quantities' => $total_quantity,
                    'total_amount' => $total_amount,
                    'created_at' => now(),
                ]);
            }
            $user_details   = Users::where('users_customers_id', $user_id)->first();
            $user_order_details   = UsersOrders::where('users_customers_id', $user_id)->first();
            return view('users.thankyou', [
                'title' => 'Thank You', 
                'cartCount' => $cartCount, 
                'user_data' => $user_details, 
                'favCount' => $favCount,
                'order_details'=> $user_order_details,
            ]);
        } else {
            return view('home', ['title'=> 'Home']);
        }
    }
    public function contact_us() {
        $cartCount = 0;
        $favCount   = 0;

        if(session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
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
