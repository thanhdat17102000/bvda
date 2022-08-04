@extends('Auth.layouts.master')
@section('title')
    Chi tiết đơn hàng
@endsection
@section('content')
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">Checkout</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h4 class="checkout-title">Thông tin giao hàng</h4>
                            <div class="billing-form-wrap">
                                    <form action="#">
                                        @foreach ($order as $item)
                                        <div class="single-input-item">
                                            <span for="f_name" class="required">Họ và tên: {{$item->m_name}}</span>
                                        </div>

                                        <div class="single-input-item">
                                            <span for="l_name" class="required">Email: {{$item->m_email}}</span>
                                        </div>
                                        <div class="single-input-item">
                                            <span for="email" class="required">Số điện thoại: {{$item->m_phone}}</span>
                                        </div>
                                        <div class="single-input-item">
                                            <span for="com-name">Địa chỉ: {{$item->m_address}} </span>
                                        </div>
                                        <div class="single-input-item">
                                            <span for="ordernote">Ghi chú</span>
                                            <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="{{$item->m_note}}" Readonly></textarea>
                                        </div>
                                        @endforeach
                                    </form>                                                                   
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h4 class="checkout-title">Chi tiết đơn</h4>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderDetail as $item)
                                                <tr>
                                                    <td><a href="#">{{$item->m_product_name}} <strong>* {{$item->m_quanti}} </strong></a></td>
                                                    <td>{{$item->m_price * $item->m_quanti}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            @foreach ($order as $item)
                                                <tr>
                                                    <td>Tổng tiền hàng</td>
                                                    <td><strong>{{$item->m_total_price}}</strong></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>Phí giao hàng</td>
                                                <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                                <label class="custom-control-label" for="flatrate">Flat
                                                                    Rate: $70.00</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                                <label class="custom-control-label" for="freeshipping">Free
                                                                    Shipping</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng đơn</td>
                                                <td><strong>$470</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <a href="/profile"><button type="submit" class="btn btn-sqr">Quay lại</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
    <!-- main wrapper end -->

@endsection
