<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = CategoryModel::where('m_id_parent', 0)->get();
        return view('Auth.home-compare.home_page',compact('categories'));
    }
    public function productdetail($slug){
        $showproductdetail = product::where('m_product_slug', $slug)->first();
        $showcategoryid = CategoryModel::where('id', $showproductdetail->m_id_category)->first();
        $showproductdetailget = product::where('id', $showproductdetail->id)->where('m_status', 1)->get();
        $showproductrelated  = product::where('m_id_category', $showcategoryid->id)->where('id','!=',$showproductdetail->id)->inRandomOrder()->where('m_status', 1)->take(8)->get();
        return view('Auth.product_details.productdetails', compact('showproductdetail','showproductdetailget','showproductrelated'));
    }
}
