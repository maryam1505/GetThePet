<?php

namespace App\Http\Controllers;

use App\Models\PetProducts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function admin_login() {
        return view("admin.login", ['title' => 'Admin login']);
    }

    public function admin_register() {
        return view("admin.register", ["title"=> "Admin Register"]);
    }

    public function dashboard() {
        return view("admin.dashboard", ["title"=> "Dashboard"]);
    }

    public function users_details() {
        if(Session::has("admin_data")) {
            $users = Users::all();
            return view("admin.users_details", ["title"=> "Users Details", 'users' => $users]);
        } else {
            return view("admin.login", ["title"=> "Admin login"]);
        }

    }

    public function pet_products() {
        if(Session::has('admin_data')) {
            $products = PetProducts::all();
            return view("admin.pet_products", ["title"=> "Pet Products", 'products' => $products]);
        } else {
            return view("admin.login", ["title"=> "Admin login"]);
        }

    }

}
