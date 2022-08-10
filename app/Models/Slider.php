<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $filltable = [
        'm_name', 'm_description', 'm_image_path', 'm_image_name'
    ];
    protected $primaryKey = 'id';
    protected $table = 't_slider';
}
