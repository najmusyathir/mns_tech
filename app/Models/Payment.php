<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'status',
        'payment_evidence',
        'created_at',
        'updated_at',        
    ];
}
