<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view("users.index", ['title' => 'Home']);
    }
    public function pharmacy() {
        return view("users.pharmacy", ["title"=> "Pharmacy"]);
    }
    public function about() {
        return view("users.about", ["title"=> "About"]);
    }
    public function pet_shop() {
        return view("users.pet_shop", ["title"=> "Pet Shop"]);
    }
    public function marketplace() {
        return view("users.marketplace", ["title"=> "Marketplace"]);
    }
    public function accessories_food() {
        return view("users.accessories_food", ["title"=> "Accessories Food"]);
    }
    public function discussion_forum() {
        return view("users.discussion_forum", ["title"=> "Discussion Forum"]);
    }
    public function pet_history() {
        return view("users.pet_history", ["title"=> "Pet History"]);
    }
    public function product_details() {
        return view("users.product_details", ["title"=> "Product Details"]);
    }
    public function cart() {
        if(Session::has("user_id")) {
            return view("users.cart", ["title"=> "Shopping Cart"]);
        } else {
            redirect()->route("home")->with('title','Home');
        }
    }
    public function CheckOut() {
        if(Session::has("user_id")) {
            return view("users.check_out", ["title"=> "Check Out"]);
        } else {
            redirect()->route("home")->with('title','Home');
        }
    }
    public function contact_us() {
        return view("users.contact", ["title"=> "Contact Us"]);
    }
    public function thankyou() {
        return view("users.thankyou", ["title"=> "Thank You"]);
    }
}