<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmt_Product extends Model
{
   protected $table = "t_commentproduct";
   protected $primaryKey = "idbl";
   protected $fillable = [
      'm_id_maloai ',
      'm_id_user ',
      'm_id_parent',
      'm_content',
      'answer_cmt',
      'm_status',
      'ngaybinhluan',
  ];
}
