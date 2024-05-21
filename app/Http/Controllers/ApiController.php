<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Users;
use App\Rules\PasswordValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    public function user_register(Request $request) {
        $request->validate(
            [
                'email'     => 'required|email|unique:users,email',
                'password'  => ['required', 'min:8', 'max:12', new PasswordValidation()],
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
        Users::create([
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'username'  => $request->username,
        ]);

        return redirect()->route('login')->with('message', 'Your account has been registered successfully!');
    }
    public function user_login(Request $request) {
        $request->validate(
            [
                'email'     => 'required|email',
                'password'  => 'required|min:8|max:12',
            ],
            [
                'email.required'    => 'The email field is required.',
                'email.email'       => 'Please enter a valid email address.',
                'password.required' => 'The password field is required.',
                'password.min'      => 'Password must be at least 8 characters long.',
                'password.max'      => 'Password cannot be more than 12 characters long.',
            ],
        );

        $user = Users::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('login')->with('message', 'User not Found');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->with('message', 'Password Incorrect');
        }
        Session::put('user_id', $user->users_customers_id);
        return redirect()->route('home');
    }

    public function logout(Request $request) { 
        if(session()->has('role')) {

            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect()->route('admin.login');
        }
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


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

        return redirect()->route('admin.login')->with('message', 'Your account has been registered successfully!');
    }
    public function Admin_login(Request $request) {
        $request->validate(
            [
                'email'     => 'required|email',
                'password'  => 'required|min:8|max:12',
            ],
            [
                'email.required'    => 'The email field is required.',
                'email.email'       => 'Please enter a valid email address.',
                'password.required' => 'The password field is required.',
                'password.min'      => 'Password must be at least 8 characters long.',
                'password.max'      => 'Password cannot be more than 12 characters long.',
            ],
        );

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->route('admin.login')->with('message', 'User not Found');
        }
        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->route('admin.login')->with('message', 'Password Incorrect');
        }
        Session::put(['id'=> $admin->administrations_id, 'role' => $admin->role, 'name' => $admin->name, 'image'=> $admin->image]);
        return redirect()->route('dashboard');
    }
    /*======================= ADMIN Panel =============================*/
}