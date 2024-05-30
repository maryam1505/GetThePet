<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*----------------------- Web Routes --------------------------------*/
/** Login **/ 
Route::get('/login',[UsersController::class,'login'])->name('login');

/** Register **/ 
Route::get('/register',[UsersController::class,'register'])->name('register');

/** Home **/ 
Route::get('/',[UsersController::class,'index'])->name('home');

/** About **/ 
Route::get('/about',[UsersController::class,'about'])->name('about');

/** Contact Us **/ 
Route::get('/contact_us',[UsersController::class,'contact_us'])->name('contact');

/** Pharmacy **/ 
Route::get('/pharmacy',[UsersController::class,'pharmacy'])->name('pharmacy');

/** Accessories And Food **/ 
Route::get('/accessories_food',[UsersController::class,'accessories_food'])->name('accessory.food');

/** Discussion Forum **/ 
Route::get('/discussion_forum',[UsersController::class,'discussion_forum'])->name('discussion.forum');

/** Pet History **/ 
Route::get('/pet_history',[UsersController::class,'pet_history'])->name('pet.history');

/** Marketplace **/ 
Route::get('/marketplace',[UsersController::class,'marketplace'])->name('marketplace');

/** Product Details **/ 
Route::get('/product_details/{id}',[UsersController::class,'product_details'])->name('product.details');

/** User Cart **/ 
Route::get('/cart',[UsersController::class,'show_cart'])->name('cart');
Route::post('/add_cart',[UsersController::class,'add_cart'])->name('add.cart');

/** Check Out **/ 
Route::post('/checkout',[UsersController::class, 'CheckOut'])->name('check.out');

/** Thank You **/ 
Route::post('/thankyou',[UsersController::class, 'thankyou'])->name('thankyou');

/** Delete cart product **/
Route::delete('/cart/delete/{id}', [UsersController::class, 'delete'])->name('cart.delete');
/*----------------------- Web Routes --------------------------------*/


/*=============================== API Routes ===============================*/
Route::post('/login',[ApiController::class,'user_login'])->name('user.login');
Route::post('/register',[ApiController::class,'user_register'])->name('user.register');
Route::post('/logout',[ApiController::class,'logout'])->name('logout');
Route::get('/logout',[ApiController::class,'logout'])->name('logout');

/*--- ADMIN API ROUTES ---*/
Route::post('/admin/login',[ApiController::class,'Admin_login'])->name('admin.login');
Route::post('/admin/register',[ApiController::class,'Admin_register'])->name('admin.register');
/*=============================== API Routes ===============================*/



/*----------------------- Admin Routes --------------------------------*/
/** Dashboard **/
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

/** Admin Login **/
Route::get('/admin/login',[AdminController::class,'admin_login'])->name('admin.login');

/** Admin Register **/
Route::get('/admin/register',[AdminController::class,'admin_register'])->name('admin.register');

/** Users Details */
Route::get('/admin/users_details',[AdminController::class,'users_details'])->name('users.details');

/** Pet Products */
Route::get('/admin/pet_products',[AdminController::class,'pet_products'])->name('pet.products');

/** Add Products */
Route::post('/admin/add_products',[AdminController::class,'add_products'])->name('add.products');

/** Add Products */
Route::post('/admin/edit_products',[AdminController::class,'edit_product'])->name('edit.products');

/** Users Details */
Route::get('/admin/users_details',[AdminController::class,'users_details'])->name('users.details');

/** Users Details */
Route::post('/admin/delete_product/{id}',[AdminController::class,'delete_product'])->name('product.delete');

/** User Actions **/
Route::post('/admin/delete_user/{id}',[AdminController::class,'delete_user'])->name('user.delete');

/** Status Update **/
Route::post('/admin/status_update/{id}/{status}',[AdminController::class,'status_update'])->name('status.update');

/*----------------------- Admin Routes --------------------------------*/