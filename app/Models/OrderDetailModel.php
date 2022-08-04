<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDeTailModel extends Model
{
    use HasFactory;

    protected $table = 't_order_detail';
    
    protected $fillable = [
        'id',
        'm_id_order',
        'm_id_product',
        'm_price',
        'm_quanti',
        'm_product_name',
    ];
}
