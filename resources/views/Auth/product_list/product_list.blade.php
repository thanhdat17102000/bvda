@extends('Auth.layouts.master')
@section('title')
    Danh sách sản phẩm
@endsection
@push('scripts')
    <script>
        $('.cart-info').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ url('api/cart') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    renderCart();
                    toastr.success('',
                        'Thêm giỏ hàng thành công')
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        $('.add-cart').click(function(e) {
            e.preventDefault();
            $(this).next('.cart-info').submit();
        });
    </script>
@endpush
@section('content')
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area bg-img" data-bg="{{ URL::asset('Auth/img/banner/breadcrumb-banner.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <nav aria-label="breadcrumb">
                                <h1 class="breadcrumb-title"> Danh sách Sản phẩm</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2">
                        <div class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>Danh mục </h3>
                                </div>
                                <div class="sidebar-body">
                                    <ul class="color-list">
                                        <li><a href="#">Nam <span>(10)</span></a></li>
                                        <li><a href="#">Nữ <span>(05)</span></a></li>
                                        <li><a href="#">Thể thao <span>(15)</span></a></li>
                                        <li><a href="#">Boot <span>(12)</span></a></li>

                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>Lọc theo giá</h3>
                                </div>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="20" data-max="400"></div>
                                        <div class="range-slider">
                                            <form action="#">
                                                <div class="price-input">
                                                    <label for="amount">giá: </label>
                                                    <input type="text" id="amount">
                                                </div>
                                                <button class="filter-btn">lọc</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>màu</h3>
                                </div>
                                <div class="sidebar-body">
                                    <ul class="color-list">
                                        <li><a href="#">vàng <span>(05)</span></a></li>
                                        <li><a href="#">xanh <span>(12)</span></a></li>
                                        <li><a href="#">trắng <span>(14)</span></a></li>
                                        <li><a href="#">đen <span>(20)</span></a></li>
                                        <li><a href="#">xám <span>(08)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>Kích cỡ</h3>
                                </div>
                                <div class="sidebar-body">
                                    <ul class="size-list">
                                        <li><a href="#">s <span>(05)</span></a></li>
                                        <li><a href="#">M <span>(06)</span></a></li>
                                        <li><a href="#">l <span>(02)</span></a></li>
                                        <li><a href="#">XL <span>(01)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <div class="sidebar-banner">
                                    <a href="#">
                                        <img src="{{ URL::asset('Auth/img/banner/banner_left.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </div>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-4 col-md-3 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view"><i
                                                        class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view"><i class="fa fa-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-8 col-md-9 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sắp xếp : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Liên quan</option>
                                                    <option value="sales">Tên (A - Z)</option>
                                                    <option value="sales">Tên (Z - A)</option>
                                                    <option value="rating">Giá (Thấp &gt; Cao)</option>
                                                    <option value="date">Đánh giá (Cao nhất)</option>
                                                    <option value="price-asc">Kiểu dáng (A - Z)</option>
                                                    <option value="price-asc">Kiểu dáng (Z - A)</option>
                                                </select>
                                            </div>
                                            <div class="product-amount">
                                                <p>đang xem 1-16 sản phẩm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list start -->
                            <div class="shop-product-wrap grid-view row mbn-50">
                                @foreach ($showproduct as $key => $showprd)
                                    <div class="col-lg-4 col-sm-6">
                                        <!-- product grid item start -->
                                        <div class="product-item mb-53">
                                            <div class="product-thumb">
                                                <a href="{{ route('productdetails', $showprd->m_product_slug) }}">
                                                    @if (json_decode($showprd->m_picture))
                                                        <img src="{{ asset('uploads') }}/{{ json_decode($showprd->m_picture)[0] }}"
                                                            alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h5 class="product-name">
                                                    <a
                                                        href="{{ route('productdetails', $showprd->m_product_slug) }}">{{ $showprd->m_product_name }}</a>
                                                </h5>
                                                <div class="price-box">
                                                    <span
                                                        class="price-regular">{{ number_format($showprd->m_price, 0, ',', '.') }}VND</span>
                                                    <span
                                                        class="price-old"><del>{{ number_format($showprd->m_original_price, 0, ',', '.') }}VND</del></span>
                                                </div>
                                                <div class="product-action-link">
                                                    <a href="/wishlist" data-toggle="tooltip" title="Yên Thích"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                    <a href="#" class="add-cart" data-toggle="tooltip"
                                                        title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                                    <form action="" method="post" class="cart-info">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="productId"
                                                            value="{{ $showprd->id }}">
                                                    </form>
                                                    <a href="#" data-toggle="modal" data-target="#quick_view">
                                                        <span data-toggle="tooltip" title="Xem Nhanh"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product grid item end -->

                                        <!-- product list item start -->
                                        <div class="product-list-item mb-30">
                                            <div class="product-thumb">
                                                <a href="product-details.html">
                                                    <img src="{{ URL::asset('Auth/img/product/product-1.jpg') }}"
                                                        alt="product thumb">
                                                </a>
                                            </div>
                                            <div class="product-content-list">
                                                <h5 class="product-name">
                                                    <a href="product-details.html">Leather Mens Slipper</a>
                                                </h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$80.00</span>
                                                    <span class="price-old"><del>$70.00</del></span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere
                                                    metus vitae arcu imperdiet, id aliquet ante scelerisque. Sed sit amet
                                                    sem vitae urna fringilla tempus.</p>
                                                <div class="product-link-2 position-static">
                                                    <a href="#" data-toggle="tooltip" title="Yêu Thích"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                    <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i
                                                            class="ion-bag"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#quick_view">
                                                        <span data-toggle="tooltip" title="Xem Nhanh"><i
                                                                class="ion-ios-eye-outline"></i></span> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product list item start -->
                                        {{-- add to cart --}}
                                    </div>
                                @endforeach
                            </div>
                            <!-- shop main wrapper end -->
                        </div>
                    </div>
                </div>
                <!-- page main wrapper end -->
    </main>
    <!-- main wrapper end -->
    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider mb-20">
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ URL::asset('Auth/img/product/product-1.jpg') }}"
                                            alt="product thumb" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ URL::asset('Auth/img/product/product-1.jpg') }}"
                                            alt="product thumb" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ URL::asset('Auth/img/product/product-1.jpg') }}"
                                            alt="product thumb" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ URL::asset('Auth/img/product/product-1.jpg') }}"
                                            alt="product thumb" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-5">
                                    <div class="pro-nav-thumb"><img
                                            src="{{ URL::asset('Auth/img/product/product-1.jpg') }}" alt="" />
                                    </div>
                                    <div class="pro-nav-thumb"><img
                                            src="{{ URL::asset('Auth/Auth/img/product/product-details-img2') }}.jpg"
                                            alt="" /></div>
                                    <div class="pro-nav-thumb"><img
                                            src="{{ URL::asset('Auth/Auth/img/product/product-details-img3') }}.jpg"
                                            alt="" /></div>
                                    <div class="pro-nav-thumb"><img
                                            src="{{ URL::asset('Auth/Auth/img/product/product-details-img4') }}.jpg"
                                            alt="" /></div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="pro-det-title">Primitive Mens Premium Shoes</h3>
                                    <div class="pro-review">
                                        <span><a href="#">1 Đánh giá(s)</a></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">$70.00</span>
                                        <span class="old-price"><del>$80.00</del></span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                    <div class="quantity-cart-box d-flex align-items-center mb-20">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <a href="cart.html" class="btn btn-default">Thêm Vào Giỏ</a>
                                    </div>
                                    <div class="availability mb-20">
                                        <h5 class="cat-title">Trạng thái:</h5>
                                        <span>Còn hàng</span>
                                    </div>
                                    <div class="share-icon">
                                        <h5 class="cat-title">Chia sẻ:</h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinteret"></i></a>
                                        <a href="#"><i class="fa fa-google-pluss"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->
@endsection
