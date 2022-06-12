<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PostModels;

class PostController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Quản lý bài viết',
            'action'=> 'post'
        ];
        return view('Admin.blog.blog-list',compact('data'));
    }
    // public function createPost(){
    //     $Post= new PostModels();
    //     $result = [
    //         'status' => 'OK',
    //         'msg' => 'Tải danh mục thành công',
    //         'data' => [],
    //     ];

    //     $Post->insert(array(
    //         $Post::FIELD_TITLE => $_POST['categoryTitle'],
    //         $Post::FIELD_ID_PARENT => $_POST['categoryIdParent']
            
    //     ));
    //     echo json_encode($result, JSON_UNESCAPED_UNICODE);
    // }

}
