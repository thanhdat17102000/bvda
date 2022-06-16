<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 't_product';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = ['id','m_id_category','m_product_name','m_product_slug','m_short_description','m_description','m_picture','m_price','m_original_price','m_buy','m_view','m_status','created_at','updated_at'];


    public function showdanhmuc(){
        return $this->hasOne(categoryModel::class,'id','m_id_category');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('m_product_name','like','%'.$key.'%');
        }
        return $query;
    }
}
