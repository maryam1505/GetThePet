<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCart extends Model
{
    use HasFactory;
    protected $table = 'users_cart_products';
    protected $primaryKey = "users_cart_products_id";
}
