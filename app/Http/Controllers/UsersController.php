<?php

namespace App\Http\Controllers;

use App\Models\PetProducts;
use App\Models\UsersCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function login() {
        return view("users.login");
    }
    public function register() {
        return view("users.signup");
    }
    public function index() {
        $products = PetProducts::all();
        
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
    
        // Pass the products and cart count to the view
        return view("users.index", [
            'title' => 'Home',
            'products' => $products,
            'cartCount' => $cartCount
        ]);
    }
    public function pharmacy() {
         // Initialize cart count to 0
         $cartCount = 0;
    
         // Check if the user is logged in and retrieve the cart count
         if (session()->has('users_data')) {
             $user_id = session('users_data')['user_id'];
             $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
         }
        $products = PetProducts::where("category","pharmacy")->get();
        return view("users.pharmacy", ["title"=> "Pharmacy","products"=> $products, 'cartCount' => $cartCount]);
    }
    public function about() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.about", ["title"=> "About", 'cartCount' => $cartCount]);
    }
    public function pet_shop() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.pet_shop", ["title"=> "Pet Shop", 'cartCount' => $cartCount]);
    }
    public function marketplace() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.marketplace", ["title"=> "Marketplace",'cartCount' => $cartCount]);
    }
    public function accessories_food() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        $products = PetProducts::whereIn("category",["Food" , "Accessories"])->get();
        return view("users.accessories_food", ["title"=> "Accessories Food","products"=> $products, 'cartCount' => $cartCount]);
    }
    public function discussion_forum() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.discussion_forum", ["title"=> "Discussion Forum",'cartCount' => $cartCount]);
    }
    public function pet_history() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.pet_history", ["title"=> "Pet History",'cartCount' => $cartCount]);
    }
    public function product_details($id) {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        $product = PetProducts::find($id);
        return view("users.product_details", ["title"=> "Product Details","product" => $product, 'cartCount' => $cartCount]);
    }
    public function show_cart() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        if(Session::has("users_data")) { 
            
            $user_id = Session::get('users_data')['user_id'];
            $cart_products = UsersCart::where('users_customers_id', $user_id)->get();
            $product_ids = [];

            foreach($cart_products as $cart_product) {
                $product_ids[] = $cart_product->pet_shop_products_id;
            }
            
            $user_products = PetProducts::whereIn('pet_shop_products_id', $product_ids)->get();
            return view("users.cart", ["title" => "Shopping Cart", 'user_products' => $user_products, 'cartCount' => $cartCount]);
        } else {
            return Redirect::route("home")->with(['title'=> 'Home','cartCount' => $cartCount]);
        }
    }
    public function add_cart(Request $request) {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        if(Session::has("users_data")) {
            $user_id = Session::get('users_data')['user_id'];
            $quantity = $request->input('quantity');
            $id = $request->input('product_id'); // Corrected from 'id' to 'product_id'
            
            $addtocart = new UsersCart();
            $addtocart->pet_shop_products_id = $id;
            $addtocart->quantity = $quantity;
            $addtocart->users_customers_id = $user_id;
        
            if($addtocart->save()) {
                $cart_products = UsersCart::where('users_customers_id', $user_id)->get();
                $product_ids = [];
                foreach($cart_products as $cart_product) {
                    $product_ids[] = $cart_product->pet_shop_products_id;
                }
                
                $user_products = PetProducts::whereIn('pet_shop_products_id', $product_ids)->get();
                return redirect()->route('cart')->with(["title" => "Check Out"]);
            } else {
                return redirect()->back()->with('error', 'Failed to add item to cart.');
            }           
        } else {
            return redirect()->route("home")->with(['title'=> 'Home','cartCount' => $cartCount]);
        }
    }
    
    
    public function CheckOut() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        if(Session::has("users_data")) {
            return view("users.check_out", ["title"=> "Check Out",'cartCount' => $cartCount]);
        } else {
            return Redirect::route("home")->with('title', 'Home');
        }
    }
    public function contact_us() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.contact", ["title"=> "Contact Us",'cartCount' => $cartCount]);
    }
    public function thankyou() {
        // Initialize cart count to 0
        $cartCount = 0;
    
        // Check if the user is logged in and retrieve the cart count
        if (session()->has('users_data')) {
            $user_id = session('users_data')['user_id'];
            $cartCount = UsersCart::where('users_customers_id', $user_id)->count();
        }
        return view("users.thankyou", ["title"=> "Thank You",'cartCount' => $cartCount]);
    }

    public function delete($id) {
        // Find the cart item by ID and delete it
        $cartItem = UsersCart::where('pet_shop_products_id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Cart item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Cart item not found.');
        }
    }
}