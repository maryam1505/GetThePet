<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'administrations';

    protected $fillable = [
        'email', 'password', 'name'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
