<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        "order_item_id",
        "order_id",
        "product_id",
        "prod_title",
        "quantity",
        "price_per_item"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
