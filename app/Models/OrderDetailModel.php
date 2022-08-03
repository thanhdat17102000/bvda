<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 't_order_detail';
    protected $filltable = [
        'm_id_order', 'm_id_product', 'm_price', 'm_quanti', 'm_product_name'
    ];
    // public function order()
    // {
    //     return $this->belongsTo(OrderModel::class, 'm_id_order', 'id');
    // }
}
