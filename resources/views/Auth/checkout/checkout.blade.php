@extends('Auth.layouts.master')
@section('title')
Thanh toán
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
                            <h1 class="breadcrumb-title">THANH TOÁN</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">TRANG CHỦ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">THANH TOÁN</li>
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
                <div class="col-12">
                    <!-- Checkout Login Coupon Accordion Start -->
                    <div class="checkoutaccordion" id="checkOutAccordion">
                        <div class="card">

                            <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <p>If you have shopped with us before, please enter your details in the boxes
                                        below. If you are a new customer, please proceed to the Billing &amp;
                                        Shipping section.</p>
                                    <div class="login-reg-form-wrap mt-20">
                                        <div class="row">
                                            <div class="col-lg-7 m-auto">
                                                <form action="#" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-input-item">
                                                                <input type="email" placeholder="Enter your Email" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="single-input-item">
                                                                <input type="password" placeholder="Enter your Password" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="single-input-item">
                                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                            <div class="remember-meta">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="rememberMe" required />
                                                                    <label class="custom-control-label" for="rememberMe">Remember
                                                                        Me</label>
                                                                </div>
                                                            </div>

                                                            <a href="#" class="forget-pwd">Forget Password?</a>
                                                        </div>
                                                    </div>

                                                    <div class="single-input-item">
                                                        <button class="btn btn-sqr">Login</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <h5>Bạn đã có mã giảm giá? <span data-toggle="collapse" data-target="#couponaccordion">Click
                                    vào đây để nhập mã</span></h5>
                            <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <div class="cart-update-option">
                                        <div class="apply-coupon-wrapper">
                                            <form action="#" method="post" class=" d-block d-md-flex">
                                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                                <button class="btn btn-sqr">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Login Coupon Accordion End -->
                </div>
            </div>
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h4 class="checkout-title">Thông tin liên hệ</h4>
                        <div class="billing-form-wrap">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="f_name" class="required">Họ</label>
                                            <input type="text" id="f_name" placeholder="Nhập họ" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="l_name" class="required">Tên</label>
                                            <input type="text" id="l_name" placeholder="Nhập tên" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" id="email" placeholder="Nhập email" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="com-name">Số điện thoại</label>
                                    <input type="text" id="com-name" placeholder="Nhập số điện thoại" />
                                </div>

                                <div class="single-input-item">
                                    <label for="country" class="required">Tỉnh/Thành phố</label>
                                    <select name="country nice-select" id="country">
                                        <option value="Vietnam">Việt Nam</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="England">England</option>
                                        <option value="London">London</option>
                                        <option value="London">London</option>
                                        <option value="Chaina">China</option>
                                    </select>
                                </div>
                                <div class="single-input-item">
                                    <label for="country" class="required">Quận/Huyện</label>
                                    <select name="country nice-select" id="country">
                                        <option value="Vietnam">Việt Nam</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="England">England</option>
                                        <option value="London">London</option>
                                        <option value="London">London</option>
                                        <option value="Chaina">China</option>
                                    </select>
                                </div>
                                <div class="single-input-item">
                                    <label for="country" class="required">Xã phường</label>
                                    <select name="country nice-select" id="country">
                                        <option value="Vietnam">Việt Nam</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="England">England</option>
                                        <option value="London">London</option>
                                        <option value="London">London</option>
                                        <option value="Chaina">China</option>
                                    </select>
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20">Địa chỉ</label>
                                    <input type="text" id="street-address" placeholder="Nhập địa chỉ" required />
                                </div>

                                <div class="single-input-item">
                                    <h5 class="text-center">Thông tin bổ sung</h5>
                                    <label for="ordernote">Ghi chú đơn hàng của bạn</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h4 class="checkout-title">Đơn hàng của bạn</h4>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="product-details.html">Giày nam <strong> × 1</strong></a>
                                            </td>
                                            <td>500.000đ</td>
                                        </tr>
                                        <tr>
                                            <td><a href="product-details.html">Giày nữ <strong> × 4</strong></a>
                                            </td>
                                            <td>500.000đ</td>
                                        </tr>
                                        <tr>
                                            <td><a href="product-details.html">Giày gay <strong> × 2</strong></a>
                                            </td>
                                            <td>500.000đ</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Phí vận chuyển</td>
                                            <td><strong>30.000đ</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Giảm giá</td>
                                            <td><strong>30.000đ</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng tiền thanh toán</td>
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
                                            <label class="custom-control-label" for="cashon">Trả tiền mặt khi nhận hàng</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Bạn đặt hàng và thanh toán sau khi nhân viên bưu điện đưa hàng đến nơi và thu tiền tận nhà bạn.</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                            <label class="custom-control-label" for="directbank">Chuyển khoản ngân hàng</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Make your payment directly into our bank account. Please use your Order
                                            ID as the payment reference. Your order will not be shipped until the
                                            funds have cleared in our account..</p>
                                    </div>
                                </div>

                                <div class="summary-footer-area">

                                    <button type="submit" class="btn btn-sqr">ĐẶT HÀNG</button>
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
@endsection