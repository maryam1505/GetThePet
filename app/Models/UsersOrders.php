<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersOrders extends Model
{
    use HasFactory;
    protected $table = 'users_orders';
    protected $primaryKey = "users_orders_id";

    protected $fillable = [
        'users_customers_id', 
        'order_number',
        'total_items',
        'total_quantities',
        'total_amount',
        'created_at',
    ];
}
