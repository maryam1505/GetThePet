<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UsersCustomers;
use Illuminate\Support\Facades\Route;

/*----------------------- Web Routes --------------------------------*/
/** Login **/
Route::get('/login', [UsersController::class, 'login'])->name('login');

/** Register **/
Route::get('/register', [UsersController::class, 'register'])->name('register');

/** Forgot Password **/
Route::get('/forgot_password', [UsersController::class, 'forgot_password'])->name('forgot.password');

/** verify OTP **/
Route::post('/verify_otp', [UsersController::class, 'Verify_OTP'])->name('verify.otp');

/** Reset Password **/
Route::post('/reset_password', [UsersController::class, 'reset_password'])->name('reset.password');

/** Reset Password **/
Route::post('/update_password', [UsersController::class, 'update_password'])->name('update.password');

/** Home **/
Route::get('/', [UsersController::class, 'index'])->name('home');

/** About **/
Route::get('/about', [UsersController::class, 'about'])->name('about');

/** Contact Us **/
Route::get('/contact_us', [UsersController::class, 'contact_us'])->name('contact');

/** Pharmacy **/
Route::get('/pharmacy', [UsersController::class, 'pharmacy'])->name('pharmacy');

/** Accessories And Food **/
Route::get('/accessories_food', [UsersController::class, 'accessories_food'])->name('accessory.food');

/** Discussion Forum **/
Route::get('/discussion_forum', [UsersController::class, 'discussion_forum'])->name('discussion.forum');

/** Pet History **/
Route::get('/pet_history', [UsersController::class, 'pet_history'])->name('pet.history');

/** Marketplace **/
Route::get('/marketplace', [UsersController::class, 'marketplace'])->name('marketplace');

/** Product Details **/
Route::get('/product_details/{id}', [UsersController::class, 'product_details'])->name('product.details');

/** User Cart **/
Route::get('/cart', [UsersController::class, 'show_cart'])->name('cart');

// Route::middleware([UsersCustomers::class])->group(function () {
    /** Ask Question**/
    Route::post('/ask_question', [UsersController::class, 'ask_question'])->name('ask.question');
    
    /** Ask Question**/
    Route::post('/send_reply', [UsersController::class, 'send_reply'])->name('send.reply');
    
    Route::post('/add_cart', [UsersController::class, 'add_cart'])->name('add.cart');

    /** Check Out **/
    Route::post('/checkout', [UsersController::class, 'CheckOut'])->name('check.out');
    
    /** Thank You **/
    Route::post('/thankyou', [UsersController::class, 'thankyou'])->name('thankyou');
    
    /** Delete cart product **/
    Route::delete('/cart/delete/{id}', [UsersController::class, 'delete'])->name('cart.delete');
// });


/*----------------------- Web Routes --------------------------------*/

/*=============================== API Routes ===============================*/
Route::post('/login', [ApiController::class, 'user_login'])->name('user.login');
Route::post('/register', [ApiController::class, 'user_register'])->name('user.register');
Route::post('/logout', [ApiController::class, 'logout'])->name('logout');
Route::get('/logout', [ApiController::class, 'logout'])->name('logout');

/*--- ADMIN API ROUTES ---*/
Route::group(['prefix'=> 'admin'], function () {
    Route::post('/register', [ApiController::class, 'Admin_register'])->name('admin.register');
    Route::post('/login', [ApiController::class, 'Admin_login'])->name('admin.login');
});
/*=============================== API Routes ===============================*/

/*----------------------- Admin Routes --------------------------------*/

Route::group(['prefix'=> 'admin'], function () {
    /** Admin Login **/
    Route::get('/login', [AdminController::class, 'admin_login'])->name('admin.login');
    
    /** Admin Register **/
    Route::get('/register', [AdminController::class, 'admin_register'])->name('admin.register');
    
    // Route::middleware([AdminMiddleware::class])->group(function () {
    
        /** Dashboard **/
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
        /** Users Details */
        Route::get('/users_details', [AdminController::class, 'users_details'])->name('users.details');
    
        /** Pet Products */
        Route::get('/pet_products', [AdminController::class, 'pet_products'])->name('pet.products');
    
        /** Add Products */
        Route::post('/add_products', [AdminController::class, 'add_products'])->name('add.products');
    
        /** Edit Product */
        Route::post('/edit_products', [AdminController::class, 'edit_product'])->name('edit.products');
    
        /** Product Orders */
        Route::get('/product_orders', [AdminController::class, 'product_orders'])->name('product.order');
    
        /** Edit Product */
        Route::post('/edit_order', [AdminController::class, 'edit_order'])->name('edit.order');
    
        /** Users Details */
        Route::get('/users_details', [AdminController::class, 'users_details'])->name('users.details');
    
        /** Users Details */
        Route::post('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('product.delete');
    
        /** User Actions **/
        Route::post('/delete_user/{id}', [AdminController::class, 'delete_user'])->name('user.delete');
    
        /** Status Update **/
        Route::post('/status_update/{id}/{status}', [AdminController::class, 'status_update'])->name('status.update');
    // });
});

/*----------------------- Admin Routes --------------------------------*/
