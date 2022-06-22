<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Comment_Product extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'QUẢN LÍ COMMENT',
            'action' => 'category'
        ];
        $query =DB::table('t_commentproduct')->select('*')->get();
        $d = json_decode(json_encode($query), true);
        return view("admin.comment-product.Comment_Product", compact('data', 'd'));
    }
    public function delete_comment($id){
        $get_id = $id;
        DB::table('t_commentproduct')->where('id','=',$get_id)->delete();
        return redirect()->route('list_comment');
    }
}
