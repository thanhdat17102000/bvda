<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Danh sách bài viết',
            'action' => '',
        ];
        return view('Admin.post.index')->with(compact('data'));
    }
    public function add_form()
    {
        $data = [
            'title' => 'Thêm bài viết',
            'action' => ''
        ];
        return view('Admin.post.add_post')->with(compact('data'));
    }
    public function edit_form($id)
    {
        $data = [
            'title' => 'Sửa bài viết',
            'action' => '',
            'id' => $id
        ];
        return view('Admin.post.edit_post')->with(compact('data'));
    }
}
