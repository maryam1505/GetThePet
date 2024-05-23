<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetProducts extends Model
{
    use HasFactory;

    protected $table = 'pet_shop_products';
    protected $primaryKey = 'pet_shop_products_id';
}
