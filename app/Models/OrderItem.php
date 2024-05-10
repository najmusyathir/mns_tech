<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    public $timestamps = false;
    public $fillable = [
        "order_item_id",
        "order_id",
        "product_id",
        "prod_title",
        "quantity",
        "price_per_item"
    ];
}
