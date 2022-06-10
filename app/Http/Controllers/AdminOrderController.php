<?php

namespace App\Http\Controllers;

use App\Models\t_order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function list(){
        return view('Admin.order.list');
        // $orders = t_order::all();
        // return $orders;
        // return view('Admin.order.list', compact('orders'));
    }
}
