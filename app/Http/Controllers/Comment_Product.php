<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cmt_Product;


class Comment_Product extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'QUẢN LÍ COMMENT SẢN PHẨM',
            'action' => 'category'
        ];
        $query = Cmt_Product::join('t_user','t_commentproduct.m_id_user','=','t_user.id')
                ->join('t_product','t_commentproduct.m_id_maloai','=','t_product.id')
                ->select('t_commentproduct.*','t_user.name','t_user.m_avatar','t_product.id','t_product.m_product_name')
                ->orderBy('t_commentproduct.ngaybinhluan')
                ->simplepaginate(10);
        return view("admin.comment-product.Comment_Product", compact('data', 'query'));
    }
    public function delete_comment($id){
        $get_id = $id;
        $result = Cmt_Product::where('idbl','=',$get_id)->delete();
        if($result) {
            $message = 'Đã Xóa Thành Công Bình Luận !';
        }
        return redirect()->route('list_comment',compact('message'));
    }
    public function get_data_cmt($idbl) {
        $id = $idbl;
        $query = Cmt_Product::join('t_user','t_commentproduct.m_id_user','=','t_user.id')
        ->join('t_product','t_commentproduct.m_id_maloai','=','t_product.id')
        ->select('t_commentproduct.*','t_user.name','t_user.m_avatar','t_product.id','t_product.m_product_name')
        ->where('idbl','=',$id)
        ->get();
        return response()->json(
            ['query' => $query]
        );
    }
}