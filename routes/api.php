<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Web APIs
 */
Route::post('/add_favourites',[ApiController::class,'Add_Favourites'])->name('add.favourites');
