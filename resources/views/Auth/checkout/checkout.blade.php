@extends('Auth.layouts.master')
@push('scripts')
    <script>
        let payMethod = "cash";

        // render cart info
        const renderCheckout = async () => {
            const response = await callApiCart();
            const {
                data,
                subtotal,
                count,
                total,
                tax,
            } = response;
            let content = ``;
            for (let key in data) {
                content += `<tr>
                                <td><a href="{{ url('chi-tiet-san-pham') }}/${data[key].options.slug}">${data[key].name} <strong> × ${data[key].qty}</strong></a>
                                </td>
                                <td>${(data[key].price * data[key].qty).toLocaleString('en-US') }</td>
                            </tr>`
            }
            $('.checkout-content').html(content)
            $('.tax').text(tax);
            $('.total-price').text(total);
        }

        renderCheckout()

        // handle change payment method
        $('input[name=paymentmethod]').change(function(e) {
            e.preventDefault();
            payMethod = $(this).val();
        });

        // submit checkout info
        $('#form-checkout').submit(function(e) {
            e.preventDefault();
            let data = new FormData(this);
            let total = $('.total-price:first').text().replace(/,/g, "");
            data.append('m_total_price', Number(total))
            $.ajax({
                type: "post",
                url: "{{ url('api/checkout') }}",
                data,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const {
                        data
                    } = response;
                    $('input[name=txnRef]').val(data.id);
                    if (payMethod == 'cash') {
                        window.location.href = "{{ route('checkout-success') }}";
                    } else if (payMethod == 'momo') {
                        $('#momo-payment').submit();
                    } else {
                        $('#vnpay-payment').submit();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endpush
@push('styles')
    <style>
        .momo::before {
            top: 10px !important
        }

        .momo::after {
            top: 11.5px !important
        }
    </style>
@endpush
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
                                                                    <input type="email" placeholder="Enter your Email"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="single-input-item">
                                                                    <input type="password" placeholder="Enter your Password"
                                                                        required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <div
                                                                class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                                <div class="remember-meta">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="rememberMe" required />
                                                                        <label class="custom-control-label"
                                                                            for="rememberMe">Remember
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
                    <div class="col-md-6 float-left" style="width: 600px;">
                        <form id="form-checkout" method="POST">
                            @csrf
                            <div class="checkout-billing-details-wrap">
                                <h4 class="checkout-title">Thông tin liên hệ</h4>
                                <div class="billing-form-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-input-item">
                                                <label for="m_name" class="required">Họ và tên</label>
                                                <input type="text" id="m_name" name="m_name"
                                                    placeholder="Nhập họ và tên" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email</label>
                                        <input type="email" id="email" name="m_email" placeholder="Nhập email" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="com-name">Số điện thoại</label>
                                        <input type="text" id="com-name" name="m_phone"
                                            placeholder="Nhập số điện thoại" />
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
                                        <input type="text" id="street-address" name="m_address"
                                            placeholder="Nhập địa chỉ" />
                                    </div>

                                    <div class="single-input-item">
                                        <h5 class="text-center">Thông tin bổ sung</h5>
                                        <label for="m_note">Ghi chú đơn hàng của bạn</label>
                                        <textarea name="m_note" id="ordernote" cols="30" rows="3"
                                            placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-footer-area">
                                <button type="submit" class="btn btn-sqr checkout-submit">ĐẶT HÀNG</button>
                            </div>
                        </form>
                    </div>


                    <!-- Order Summary Details -->
                    <div class="col-md-6 float-right">
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
                                        <tbody class="checkout-content">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Phí vận chuyển</td>
                                                <td><strong>0</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Thuế</td>
                                                <td><strong class="tax"></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Giảm giá</td>
                                                <td><strong class="coupon">0</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền thanh toán</td>
                                                <td><strong class="total-price"></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                    class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Trả tiền mặt khi
                                                    nhận hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="momo" name="paymentmethod" value="momo"
                                                    class="custom-control-input" />
                                                <label class="custom-control-label momo" for="momo">
                                                    <img class="method-icon"
                                                        src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-momo.svg"
                                                        width="32" height="32" alt="icon">
                                                    Thanh toán MoMo
                                                </label>
                                            </div>
                                        </div>
                                        <form action="{{ route('momo-payment') }}" id="momo-payment" method="post">
                                            @csrf
                                            <input type="hidden" name="total_momo" id="total_momo"
                                                value="{{ str_replace(',', '', Cart::total(0)) }}">
                                        </form>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="vnpay" name="paymentmethod" value="vnpay"
                                                    class="custom-control-input" />
                                                <label class="custom-control-label momo" for="vnpay">
                                                    <img class="method-icon"
                                                        src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-vnpay.png"
                                                        width="32" height="32" alt="icon">
                                                    Thanh toán VNPay
                                                </label>
                                            </div>
                                        </div>
                                        <form action="{{ route('vnpay-payment') }}" method="post" id="vnpay-payment">
                                            @csrf
                                            <input type="hidden" name="txnRef">
                                            <input type="hidden" name="total_vnpay" id="total_vnpay"
                                                value="{{ str_replace(',', '', Cart::total(0)) }}">
                                            <input type="hidden" name="redirect">
                                        </form>
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
