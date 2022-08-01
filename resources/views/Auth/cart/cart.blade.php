@extends('Auth.layouts.master')
@section('title')
    Giỏ hàng
@endsection
@section('content')
    @push('scripts')
        <script>
            const renderCartTable = async () => {
                const response = await callApiCart();
                const {
                    data,
                    subtotal,
                    total,
                    tax,
                    totalNoTax
                } = response;
                let content = ``;
                for (let key in data) {
                    content += `<tr>
                                    <td class="pro-thumbnail"><a href="{{ url('chi-tiet-san-pham') }}/${data[key].options.slug}"><img class="img-fluid"
                                                src="{{ asset('uploads') }}/${data[key].options.image}"
                                                alt="Product" /></a></td>
                                    <td class="pro-title"><a href="{{ url('chi-tiet-san-pham') }}/${data[key].options.slug}">${data[key].name}</a></td>
                                    <td class="pro-price" data-price="${data[key].price}"><span>${data[key].price.toLocaleString('en-US')}</span></td>
                                    <td class="pro-quantity">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn">-</span>
                                            <input type="text" value="${data[key].qty}">
                                            <span class="inc qtybtn">+</span>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>${(data[key].price * data[key].qty).toLocaleString('en-US') }</span></td>
                                    <td class="pro-remove" data-id="${key}"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                </tr>`
                }
                $('.cart-content').html(content);
                $('.pro-qty input').change(function(e) {
                    let subtotal = Number($(this).val()) * Number($(this).parents('.pro-quantity').prev().data(
                        'price'));
                    $(this).parents('.pro-quantity').next('.pro-subtotal').text(subtotal.toLocaleString(
                        'en-US'));
                });
                $('.subtotal-amount').text(subtotal)
                $('.total-amount').text(total)
                $('.tax').text(tax)

                $('.pro-remove').click(function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    $.ajax({
                        type: "delete",
                        url: `{{ url('api/cart') }}/${id}`,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log(response);
                            renderCart();
                            renderCartTable();
                            toastr.success('',
                                'Xóa giỏ hàng thành công')
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });

                $('.dec').click(function(e) {
                    if ($(this).next().val() > 1) {
                        $(this).next().val($(this).next().val() - 1)
                    }
                })

                $('.inc').click(function(e) {
                    $(this).prev().val(Number($(this).prev().val()) + 1)
                })
            }
            renderCartTable();
            $('.cart-update').click(function(e) {
                e.preventDefault();
                $('.cart-content tr').each(function() {
                    let qty = $(this).children('.pro-quantity').children().children('input').val();
                    let id = $(this).children('.pro-remove').data('id');
                    $.ajax({
                        type: "post",
                        url: `{{ url('api/cart') }}/${id}`,
                        data: {
                            _method: "PUT",
                            _token: "{{ csrf_token() }}",
                            id,
                            qty,
                        },
                        success: function(response) {
                            console.log(response);
                            renderCart();
                            renderCartTable();
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                })
                toastr.success("Cập nhật giỏ hàng thành công")
            });
        </script>
    @endpush
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="assets/Auth/img/banner/breadcrumb-banner.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title">GIỎ HÀNG</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">TRANG CHỦ</a></li>
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
                                    <tbody class="cart-content">

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
                                                <td class="subtotal-amount"></td>
                                            </tr>
                                            <tr>
                                                <td>Thuế</td>
                                                <td class="tax"></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng tiền thanh toán</td>
                                                <td class="total-amount"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="{{ route('checkout') }}" class="btn d-block">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
@endsection
