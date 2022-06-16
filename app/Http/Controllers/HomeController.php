<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = CategoryModel::where('m_id_parent', 0)->get();
        return view('Auth.home-compare.home_page',compact('categories'));
    }
}
