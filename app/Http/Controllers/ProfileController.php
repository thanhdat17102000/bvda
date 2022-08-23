<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\AccountModel;
use App\Models\OrderDeTailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Tests\Shoppingcart\Fixtures\ProductModel;
use App\Models\product;


class ProfileController extends Controller
{
    // Profile
    public function profile(){
        $order = OrderModel::where( 'm_id_user',Auth::user()->id)->get();
        return view('Auth.account.profile', compact('order'));
    }
    // Chi tiết đơn hàng
    public function order($id){
        $order = OrderModel::where('id',$id)->get();
        $orderDetail = OrderDeTailModel::where('m_id_order', $id)->get();
        return view('Auth.account.order', compact('orderDetail', 'order'));
    }
    // Hủy đơn hàng nếu chưa được xác nhận
    public function cancelled($id){
        $order = OrderModel::find($id);
        $order->m_status = "3";
        $order->update();
        return redirect()->back()->with('alert_success', 'Hủy đơn hàng thành công');
    }
    // Cập nhật thông tin profile
    public function updateProfile(Request $request)
    {
        $updated = accountModel::find(\Auth::user()->id);
        $updated->email = $request->email;
        $updated->phone = $request->phone;
        $updated->m_address = $request->m_address;
        if($updated->save()){
            return redirect()->route('updateProfile')->with('alert_success', 'Cập nhật thông tin thành công.');}
    }
    
    public function doithongtinuser(Request $request){
        $updated = accountModel::find(\Auth::user()->id);
        $updated->email = $request->email;
        $updated->phone = $request->phone;
        $updated->m_address = $request->m_address;
        if($updated->save()){
            return redirect()->back()->with('alert_success', 'Cập nhật thông tin thành công.');
        }
    }
    public function doimatkhauuser(Request $request){
        $id = $request->id;
        $data = $request->all();
        $passold = $data['matkhaucu'];
        // dd($data['matkhaucu']);
        // dd($data['xacnhanmatkhau']);
        if(Hash::check($passold, \Auth::user()->password)){
            if($data['matkhaumoi'] == $data['xacnhanmatkhau']){
                $updated = accountModel::find(\Auth::user()->id);
                $updated->password = Hash::make($data['matkhaumoi']);
                if($updated->save()){
                    echo 'Đổi mật khẩu thành công!';
                }       
            }
        }
    }

}
