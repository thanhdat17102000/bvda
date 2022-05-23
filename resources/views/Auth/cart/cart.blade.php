@extends('Auth.layouts.master')
@section('title')
    Giỏ hàng
@endsection
@section('content')
<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">GIỎ HÀNG</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">TRANG CHỦ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">GIỎ HÀNG</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">ẢNH SẢN PHẨM</th>
                                            <th class="pro-title">TÊN SẢN PHẨM</th>
                                            <th class="pro-price">GIÁ</th>
                                            <th class="pro-quantity">SỐ LƯỢNG</th>
                                            <th class="pro-subtotal">TỔNG TIỀN</th>
                                            <th class="pro-remove">XÓA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('img/product/product-1.jpg')}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#">Giày nam</a></td>
                                            <td class="pro-price"><span>500.000đ</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                            </td>
                                            <td class="pro-subtotal"><span>500.000đ</span></td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('img/product/product-2.jpg')}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#">Giày nữ</a></td>
                                            <td class="pro-price"><span>500.000đ</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" value="2"></div>
                                            </td>
                                            <td class="pro-subtotal"><span>500.000đ</span></td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('img/product/product-3.jpg')}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#">Giày gay</a></td>
                                            <td class="pro-price"><span>500.000đ</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="1" />
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>500.000đ</span></td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('img/product/product-4.jpg')}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#">Giày vip</a></td>
                                            <td class="pro-price"><span>500.000đ</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="3" />
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>500.000đ</span></td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Nhập mã giảm giá" required />
                                        <button class="btn">ÁP DỤNG</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn">CẬP NHẬT GIỎ HÀNG</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h3>TỔNG TIỀN </h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Tổng tiền hàng</td>
                                                <td>500.000đ</td>
                                            </tr>
                                            <tr>
                                                <td>Phí vận chuyển</td>
                                                <td>500.000đ</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng tiền thanh toán</td>
                                                <td class="total-amount">500.000đ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="checkout" class="btn d-block">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>



@endsection