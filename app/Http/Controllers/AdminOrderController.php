<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    //
    public function __construct()
    {
    }
    public function action(Request $request)
    {
        $list_check = $request->input('checkItem');
        if (!empty($list_check)) {
            $act = $request->input('actions');
            if ($act == 'confirm') {
                foreach ($list_check as $id) {
                    DB::table('t_order')
                        ->where('id', $id)
                        ->update([
                            'm_status' => 1
                        ]);
                }
                return redirect()->route('order')->with('status', 'Bạn đã áp dụng tác vụ thành công');
            }
            if ($act == 'cancel') {
                foreach ($list_check as $id) {
                    DB::table('t_order')
                        ->where('id', $id)
                        ->update([
                            'm_status' => 0
                        ]);
                }
                return redirect()->route('order')->with('status', 'Bạn đã áp dụng tác vụ thành công');
            }
        }else{
            return redirect()->route('order')->with('error', 'Bạn chưa chọn tác vụ');
        }
    }
    public function index(Request $request)
    {
        $data = [
            'title' => 'DANH SÁCH ĐƠN HÀNG',
            'action' => 'order'
        ];
        $status = $request->input('status');
        if ($status == 'confirm') {
            $orders = DB::table('t_order')->where('m_status', 1)->get();
        } elseif ($status == 'cancel') {
            $orders = DB::table('t_order')->where('m_status', 0)->get();
        } else {
            $orders = DB::table('t_order')->get();
        }
        $count_confirm = DB::table('t_order')->where('m_status', 1)->count();
        $count_cancel = DB::table('t_order')->where('m_status', 0)->count();
        $count = [$count_confirm, $count_cancel];
        $count_total = $count[0] + $count[1];
        return view('Admin.order.list', compact('data', 'orders', 'count', 'count_total'));
    }
    public function list()
    {
        // return view('Admin.order.list');
        // $orders = t_order::all();
        // return $orders;
        // return view('Admin.order.list', compact('orders'));
    }
    public function store(Request $request)
    {
        $orders = DB::table('t_order')->insert(
            [
                'm_name' => $request->m_name,
                'm_email' => $request->m_email,
                'm_address' => $request->m_address,
                'm_phone' => $request->m_phone,
                'm_note' => $request->m_note,
            ]
        );
        return view('Auth.checkout.success');
    }
    public function detail()
    {
        $data = [
            'title' => 'CHI TIẾT ĐƠN HÀNG',
            'action' => 'order_detail'
        ];
        $orders = DB::table('t_order_detail')->get();
        return view('Admin.order.detail', compact('orders', 'data'));
    }
}
