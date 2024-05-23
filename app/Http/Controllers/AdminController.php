<?php

namespace App\Http\Controllers;

use App\Models\PetProducts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            $products = PetProducts::orderBy('created_at', 'desc')->get();
            return view("admin.pet_products", ["title"=> "Pet Products", 'products' => $products]);
        } else {
            return view("admin.login", ["title"=> "Admin login"]);
        }
    }

    public function add_products(Request $request) {
        if(Session::has('admin_data')) {
            $validate = $request->validate([
                'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'product_name'  => 'required|string|max:255',
                'short_desc'    => 'required',
                'description'   => 'required',
                'category'      => 'required',
                'sub_category'  => 'required',
                'currency'      => 'required',
                'price'         => 'required',
                'stock'         => 'required',
                'status'        => 'required',
                    
            ]);
        
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $filename = time() . '_' . $imageFile->getClientOriginalName();
                
                if (Storage::disk('public')->exists('uploads')) {
                    $imagePath = $imageFile->storeAs('uploads', $filename, 'public');
                }
            } 
            
            $product = new PetProducts();
            $product->name = $validate['product_name'];
            $product->short_description = $validate['short_desc'];
            $product->description = $validate['description'];
            $product->category = $validate['category'];
            $product->sub_category = $validate['sub_category'];
        
            $product->currency = $validate['currency'];
            $product->price = $validate['price'];
            $product->stock = $validate['stock'];
            $product->status = $validate['status'];
            $product->image = $imagePath;
        
            $product->save();
            return redirect()->route("pet.products")->with(["title"=> "Pet Products"],['message'=>'Product Added Successfully!']);
        } else {
            return view("admin.login", ["title"=> "Admin login"]);
        }
    }

    public function delete_product(Request $request) {
        $id = $request->input("delete_id");
        $product = PetProducts::find($id);
        if ($product->delete()) {
            return redirect()->route("admin.pet_products")->with(["title"=> "Pet Products"]);
        }
    }

    public function edit_product(Request $request) {
        if(Session::has('admin_data')) {
            $validate = $request->validate([
                'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'product_name'  => 'required|string|max:255',
                'short_desc'    => 'required',
                'description'   => 'required',
                'category'      => 'required',
                'sub_category'  => 'required',
                'currency'      => 'required',
                'price'         => 'required',
                'stock'         => 'required',
                'status'        => 'required',
                    
            ]);
        
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $filename = time() . '_' . $imageFile->getClientOriginalName();
                
                if (Storage::disk('public')->exists('uploads')) {
                    $imagePath = $imageFile->storeAs('uploads', $filename, 'public');
                }
            } 
            
            $product = new PetProducts();
            $product->name = $validate['product_name'];
            $product->short_description = $validate['short_desc'];
            $product->description = $validate['description'];
            $product->category = $validate['category'];
            $product->sub_category = $validate['sub_category'];
        
            $product->currency = $validate['currency'];
            $product->price = $validate['price'];
            $product->stock = $validate['stock'];
            $product->status = $validate['status'];
            $product->image = $imagePath;
        
            $product->update();
            return redirect()->route("pet.products")->with(["title"=> "Pet Products"],['message'=>'Product Added Successfully!']);
        } else {
            return view("admin.login", ["title"=> "Admin login"]);
        }
    }
}
