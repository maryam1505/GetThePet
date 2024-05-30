<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFavourites extends Model
{
    use HasFactory;
    protected $table = 'liked_products';
    protected $primaryKey = "liked_products_id";
}
