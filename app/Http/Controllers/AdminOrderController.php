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
    public function index()
    {
        $data = [
            'title' => 'DANH SÁCH ĐƠN HÀNG',
            'action' => 'order'
        ];
        $orders = DB::table('t_order')->get();
        return view('Admin.order.list', compact('data', 'orders'));
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
