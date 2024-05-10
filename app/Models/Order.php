<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'order_id',
        'user_id',
        'total_price',
        'status',
        'created_at',
        'updated_at',
        
    ];
}
