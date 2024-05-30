<?php

namespace App\Http\Controllers;

use App\Models\PetProducts;
use App\Models\Users;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin_login() {
        if(Session::has("admin_data")) {
            return redirect()->route("dashboard")->with(["title"=> "Dashboard", "success" => "You are already Logged In!"]);
        }
        return view("admin.login", ['title' => 'Admin login']);
    }

    public function admin_register() {
        if(Session::has("admin_data")) {
            return redirect()->route("dashboard")->with(["title"=> "Dashboard", "success" => "You are already Logged In!"]);
        }
        return view("admin.register", ["title"=> "Admin Register"]);
    }

    public function dashboard() {
        if(Session::has("admin_data")) {
            $wanted_products = PetProducts::whereIn('pet_shop_products_id', function($query) {
                $query->select('pet_shop_products_id')
                      ->from('liked_products')
                      ->where('status', 'Liked')
                      ->groupBy('pet_shop_products_id')
                      ->havingRaw('COUNT(*) > 1');
            })->limit(4)->get();
            $active_users = Users::where('status', 'Active')->limit(3)->get();
            $current_month = date('m');
            $recent_users = Users::whereMonth('created_at', '=', $current_month)
                         ->whereYear('created_at', '=', date('Y'))->orderBy('created_at', 'desc')->limit(3)->get();
            $recent_products = PetProducts::whereMonth('created_at', '=', $current_month)
                         ->whereYear('created_at', '=', date('Y'))->orderBy('created_at', 'desc')->limit(4)->get();
            return view("admin.dashboard", [
                "title"             => "Dashboard", 
                'active_users'      => $active_users, 
                'recent_users'      => $recent_users,
                "wanted_products"   => $wanted_products,
                "recent_products"   => $recent_products,
            ]);
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }
    }

    public function users_details() {
        if(Session::has("admin_data")) {
            $users = Users::all();
            return view("admin.users_details", ["title"=> "Users Details", 'users' => $users]);
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }

    }

    public function pet_products() {
        if(Session::has('admin_data')) {
            $products = PetProducts::orderBy('created_at', 'desc')->get();
            return view("admin.pet_products", ["title"=> "Pet Products", 'products' => $products]);
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
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
            return redirect()->route("pet.products")->with(["title"=> "Pet Products",'success'=>'Product Added Successfully!']);
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }
    }

    public function delete_product($id) {
        if(Session::has('admin_data')) {
            $product = PetProducts::find($id);
            if ($product) {
                if ($product->delete()) {
                    return redirect()->route("pet.products")->with(["title"=> "Pet Products", "success" => "Product Deleted successfully!"]);
                } else {
                    return redirect()->route("pet.products")->with(["title"=> "Pet Products", "error" => "Failed to delete product."]);
                }
            } else {
                return redirect()->route("pet.products")->with(["title"=> "Pet Products", "error" => "Product". $id ."not found."]);
            }
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }
    }

    public function edit_product(Request $request) {
        if(Session::has('admin_data')) {
            $product_id = $request->input('product_id');
             
            $data = [
                'name' => $request->input('product_name'),
                'short_description' => $request->input('short_desc'),
                'description' => $request->input('description'),
                'category' => $request->input('category'),
                'sub_category' => $request->input('sub_category'),
                'currency' => $request->input('currency'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'status' => $request->input('status'),
            ];
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $filename = time() . '_' . $imageFile->getClientOriginalName();
                
                $imagePath = $imageFile->storeAs('uploads', $filename, 'public');
                $data['image'] = $imagePath;
            }
            $update = PetProducts::where('pet_shop_products_id', $product_id)->update($data);
            if($update) {
                return redirect()->route("pet.products")->with(["title"=> "Pet Products",'success'=>'Product Updated Successfully!']);
            } else {
                return redirect()->route("pet.products")->with(["title"=> "Pet Products",'error'=>'Unfortunately Product is not updated']);
            }
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }
    }

    public function delete_user($id) {
        if(Session::has('admin_data')) {
            $done = Users::where("users_customers_id",$id)->update(['status' => 'Deleted']);
            if($done) {
                return redirect()->route("users.details")->with(['title' => 'Users Customers', 'success' =>'User Deleted successfully!']);
            }
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }
    }

    public function status_update($id, $status) {
        if(Session::has('admin_data')) {
            $done = Users::where('users_customers_id', $id)->update(['status'=> $status]);
            if($done) {
                return redirect()->route("users.details")->with(['title' => 'Users Customers', 'success' =>'User Status has been Updated successfully!']);
            }
        } else {
            return redirect()->route("admin.login")->with(['title' => 'Admin login', 'error' =>'You need to login First!']);
        }   
    }
}
