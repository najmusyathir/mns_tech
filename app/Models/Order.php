<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    
    public $fillable = [
        'order_id',
        'user_id',
        'total_price',
        'status',
        'payment_evidence',
        'created_at',
        'updated_at',
        
    ];
}
