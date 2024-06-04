<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*----------------------
    WEB APIs
-----------------------*/

Route::post('/add_favourites',[ApiController::class,'Add_Favourites'])->name('add.favourites');

Route::post('/reply_likes',[ApiController::class,'reply_likes'])->name('reply.likes');

Route::post('/question_likes',[ApiController::class,'question_likes'])->name('question.likes');
