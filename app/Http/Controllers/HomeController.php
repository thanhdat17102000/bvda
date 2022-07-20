<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\product;
use App\Models\Cmt_product;
use App\Models\OrderModel;
use Carbon\Carbon;
use DB;
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
        $showcomment = Cmt_product::where('m_id_maloai', $showproductdetail->id)->get();

        return view('Auth.product_details.productdetails', compact('showproductdetail','showproductdetailget','showproductrelated','showcomment'));
    }
    public function postcomment(Request $request){
        if($datacmt = Cmt_product::where('m_id_user', \Auth::user()->id)->where('m_id_maloai', $request->idmaloai)->exists()){
            if($datacmt){
                $datarq = $request->all();
                $updated = Cmt_product::find($datarq['idbl']);
                $updated->m_id_parent = 1;
                $updated->m_content = $datarq['noi_dung'];
                $updated->ratings = $datarq['rating'];
                $updated->save();
                echo 'thanhcong';
            }
        }elseif($data = DB::table('t_order')->where('m_id_user', $request->iduser)->exists() &&  $data1 = DB::table('t_order_detail')->where('m_id_product', $request->idmaloai)->exists()){
            if($data && $data1){
                $data = $request->all();
                $created = new Cmt_product();
                $created->m_id_maloai = $data['idmaloai'];
                $created->m_id_user = $data['iduser'];
                $created->m_id_parent = 1;
                $created->m_content = $data['noi_dung'];
                $created->ratings = $data['rating'];
                $created->save();
                echo 'thanhcong';
            }
        }
    }

    public function showdelete(Request $request){
        $data = $request->all();
        $deleted = Cmt_product::find($data['iddelete']);
        $deleted->delete();
        echo 'thanhcong';
    }
}
