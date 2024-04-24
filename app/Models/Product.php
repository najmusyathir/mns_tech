<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'prod_title',
        'prod_desc',
        'prod_brand',
        'prod_type',
        'prod_pic',
        'prod_price',
        'prod_stock',
    ];
}
