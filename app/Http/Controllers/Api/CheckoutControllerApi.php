<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\Province;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $province = Province::find($data['province_nice-select']);
        $district = District::find($data['district_nice-select']);
        $ward = Ward::find($data['ward_nice-select']);
        $order = new OrderModel();
        $order->m_name = $request->m_name;
        $order->m_email = $request->m_email;
        $order->m_address = $data['m_address'] . "," . $ward->_prefix . " " . $ward->_name . "," . $district->_prefix . " " . $district->_name . "," . $province->_name;
        $order->m_phone = $request->m_phone;
        $order->m_note = $request->m_note;
        $order->m_total_price = $request->m_total_price;
        $order->m_status_ship = 0;
        $order->m_status_pay = 0;
        $result = $order->save();

        $id = $order->id;
        $content = Cart::content();
        foreach ($content as $item) {
            $orderDetail = new OrderDetailModel();
            $orderDetail->m_id_order = $id;
            $orderDetail->m_id_product = $item->id;
            $orderDetail->m_price = $item->price;
            $orderDetail->m_quanti = $item->qty;
            $orderDetail->m_product_name = $item->name;
            $orderDetail->save();
        }
        return ["IsError" => false, "message" => "Đặt hàng thành công !", "data" => $result];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
