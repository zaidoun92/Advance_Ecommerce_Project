<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Products::class,'product_id','id');
    }


    public function order() {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
