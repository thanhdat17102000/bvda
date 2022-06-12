<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    
    public function index(){
        $data = [
            'title' => 'Quản lý khách hàng',
            'action'=> 'User'
        ];
        return view('Admin.user.user',compact('data'));
    }

}