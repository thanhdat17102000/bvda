@extends('Auth.layouts.master')
@section('title')
    TRANG CHỦ
@endsection
@section('content')
<main>
        <!-- hero slider section start -->
        <section class="hero-slider">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                            <!-- single slider item start -->
                            <div class="hero-single-slide">
                                <div class="hero-slider-item bg-img" data-bg="https://media.mysport.lv/wysiwyg/Brendu_kategoriju_content_LV/adidas-apagerbs-baneris.jpg">
                                    <div class="hero-slider-content slide-1">
                                        <h5 class="slide-subtitle">Bán chạy nhất!</h5>
                                        <h2 class="slide-title">Bộ sưu tập</h2>
                                        <p class="slide-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid</p>
                                        <a href="shop.html" class="btn btn-hero">XEM NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <!-- single slider item end -->

                            <!-- single slider item start -->
                            <div class="hero-single-slide">
                                <div class="hero-slider-item bg-img" data-bg="https://i0.wp.com/www.runsociety.com/wp-content/uploads/2016/02/adidas-PureBOOST-X-thumb.jpg?fit=960%2C540&ssl=1">
                                    <div class="hero-slider-content slide-1">
                                        <h5 class="slide-subtitle">Xem nhiều!</h5>
                                        <h2 class="slide-title">Top trending</h2>
                                        <p class="slide-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid</p>
                                        <a href="/product_list" class="btn btn-hero">XEM NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <!-- single slider item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero slider section end -->

        <!-- service features start -->
        <section class="service-policy-area">
            <div class="container">
                <div class="row">
                    <!-- single policy item start -->
                    <div class="col-lg-4">
                        <div class="service-policy-item mt-30 bg-1">
                            <div class="policy-icon">
                                <img src="{{URL::asset('Auth/img/icon/policy-1.png')}}" alt="policy icon">
                            </div>
                            <div class="policy-content">
                                <h5 class="policy-title">MIỄN PHÍ VẬN CHUYỂN</h5>
                                <p class="policy-desc">Giao hàng miễn phí cho tất cả các đơn đặt hàng</p>
                            </div>
                        </div>
                    </div>
                    <!-- single policy item start -->

                    <!-- single policy item start -->
                    <div class="col-lg-4">
                        <div class="service-policy-item mt-30 bg-2">
                            <div class="policy-icon">
                                <img src="{{URL::asset('Auth/img/icon/policy-2.png')}}" alt="policy icon">
                            </div>
                            <div class="policy-content">
                                <h5 class="policy-title">HỖ TRỢ TRỰC TUYẾN</h5>
                                <p class="policy-desc">Hỗ trợ trực tuyến 24 giờ một ngày</p>
                            </div>
                        </div>
                    </div>
                    <!-- single policy item start -->

                    <!-- single policy item start -->
                    <div class="col-lg-4">
                        <div class="service-policy-item mt-30 bg-3">
                            <div class="policy-icon">
                                <img src="{{URL::asset('Auth/img/icon/policy-3.png')}}" alt="policy icon">
                            </div>
                            <div class="policy-content">
                                <h5 class="policy-title">TIỀN TRẢ LẠI</h5>
                                <p class="policy-desc">Đảm bảo trở lại dưới 5 ngày nếu có kỳ vấn đề nào xảy ra</p>
                            </div>
                        </div>
                    </div>
                    <!-- single policy item start -->
                </div>
            </div>
        </section>
        <!-- service features end -->

        <!-- our product area start -->
        <section class="our-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Sản Phẩm Của Chúng Tôi</h2>
                            <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                            <!-- product single item start -->
                            <div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{{URL::asset('Auth/img/product/product-1.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="product-details.html">Leather Mens Slipper</a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular">650.000 vnđ</span>
                                        <span class="price-old"><del>120.000 vnđ</del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                            title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{{URL::asset('Auth/img/product/product-1.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="product-details.html">Leather Mens Slipper</a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular">650.000 vnđ</span>
                                        <span class="price-old"><del>120.000 vnđ</del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                            title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{{URL::asset('Auth/img/product/product-1.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="product-details.html">Leather Mens Slipper</a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular">650.000 vnđ</span>
                                        <span class="price-old"><del>120.000 vnđ</del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                            title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                    </div>
                                </div>
                            </div>

                            <div class="product-item mb-50">
                                <div class="product-thumb">
                                    <a href="product-details.html">
                                        <img src="{{URL::asset('Auth/img/product/product-1.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">
                                        <a href="product-details.html">Leather Mens Slipper</a>
                                    </h5>
                                    <div class="price-box">
                                        <span class="price-regular">650.000 vnđ</span>
                                        <span class="price-old"><del>120.000 vnđ</del></span>
                                    </div>
                                    <div class="product-action-link">
                                        <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                            title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- our product area end -->

        <!-- banner statistic area start -->
        <div class="banner-statistics">
            <div class="container">
                <div class="row no-gutters mtn-30">
                    <div class="col-md-6">
                        <div class="img-container mt-30">
                            <a href="product-details.html">
                                <img src="{{URL::asset('Auth/img/banner/banner-1.jpg')}}" alt="banner-image">
                            </a>
                            <div class="banner-text">
                                <h5 class="banner-subtitle">GIÀY THỂ THAO</h5>
                                <h3 class="banner-title">GIẢM GIÁ 20%<br>CHO NAM GIỚI THỂ THAO</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-container mt-30">
                            <a href="product-details.html">
                                <img src="{{URL::asset('Auth/img/banner/banner-2.jpg')}}" alt="banner-image">
                            </a>
                            <div class="banner-text">
                                <h5 class="banner-subtitle">GIÀY THỂ THAO</h5>
                                <h3 class="banner-title">GIẢM GIÁ 20%<br>CHO NỮ GIỚI THỂ THAO</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistic area end -->

        <!-- top seller area start -->
        <section class="top-seller-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">sản phẩm bán chạy</h2>
                            <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="product-banner">
                            <a href="#">
                                <img src="{{URL::asset('Auth/img/banner/banner-3.jpg')}}" alt="product banner">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="top-seller-carousel slick-row-15 mtn-30">
                            <!-- product item start -->
                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="{{URL::asset('Auth/img/product/pro-small-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="product-details.html">Addidas Future</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">650.000 vnđ</span>
                                            <span class="price-old"><del>120.000 vnđ</del></span>
                                        </div>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                        </div>
                                        <div class="product-link-2">
                                            <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                                title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->
                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="{{URL::asset('Auth/img/product/pro-small-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="product-details.html">Addidas Future</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">650.000 vnđ</span>
                                            <span class="price-old"><del>120.000 vnđ</del></span>
                                        </div>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                        </div>
                                        <div class="product-link-2">
                                            <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏ"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                                title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product item start -->
                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="{{URL::asset('Auth/img/product/pro-small-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="product-details.html">Addidas Future</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">650.000 vnđ</span>
                                            <span class="price-old"><del>120.000 vnđ</del></span>
                                        </div>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                        </div>
                                        <div class="product-link-2">
                                            <a href="#" data-toggle="tooltip" title="Yêu thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm vào giỏ hàng"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                                title="Quick View"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="{{URL::asset('Auth/img/product/pro-small-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="product-details.html">Addidas Future</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">650.000 vnđ</span>
                                            <span class="price-old"><del>120.000 vnđ</del></span>
                                        </div>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                        </div>
                                        <div class="product-link-2">
                                            <a href="#" data-toggle="tooltip" title="Yêu thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm vào giỏ hàng"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                                title="Quick View"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="{{URL::asset('Auth/img/product/pro-small-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="product-details.html">Addidas Future</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">650.000 vnđ</span>
                                            <span class="price-old"><del>120.000 vnđ</del></span>
                                        </div>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                        </div>
                                        <div class="product-link-2">
                                            <a href="#" data-toggle="tooltip" title="Yêu thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm vào giỏ hàng"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                                title="Quick View"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item">
                                <div class="pro-item-small mt-30">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="{{URL::asset('Auth/img/product/pro-small-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="pro-small-content">
                                        <h6 class="product-name">
                                            <a href="product-details.html">Addidas Future</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">650.000 vnđ</span>
                                            <span class="price-old"><del>120.000 vnđ</del></span>
                                        </div>
                                        <div class="ratings">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                        </div>
                                        <div class="product-link-2">
                                            <a href="#" data-toggle="tooltip" title="Yêu thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm vào giỏ hàng"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip"
                                                title="Quick View"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- lưu ý chỉ có 6 hoặc 8 sản phẩm ở đây thôi nhé -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- top seller area end -->

        <!-- latest blog area start -->
        <section class="latest-blog-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">blog</h2>
                            <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-15">
                            <!-- blog single item start -->
                            <div class="blog-post-item">
                                <div class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{URL::asset('Auth/img/blog/blog-1.jpg')}}" alt="blog thumb">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">
                                            Cách mang giày không bị đau chân
                                        </a>
                                    </h5>
                                    <ul class="blog-meta">
                                        <li><span>By: </span>DJ Thành Đạt</li>
                                        <li><span>Lượt xem : </span>14.07.2029</li>
                                    </ul>
                                    <a href="blog-details.html" class="read-more">Đọc ngay...</a>
                                </div>
                            </div>
                            <!-- blog single item start -->

                            <!-- blog single item start -->
                            <div class="blog-post-item">
                                <div class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{URL::asset('Auth/img/blog/blog-2.jpg')}}" alt="blog thumb">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">
                                            Scott đã chạy thành công 500km 
                                        </a>
                                    </h5>
                                    <ul class="blog-meta">
                                        <li><span>By: </span>DJ Thành Đạt</li>
                                        <li><span>Lượt xem: </span>14.07.2029</li>
                                    </ul>
                                    <a href="blog-details.html" class="read-more">Đọc ngay...</a>
                                </div>
                            </div>
                            <!-- blog single item start -->

                            <!-- blog single item start -->
                            <div class="blog-post-item">
                                <div class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{URL::asset('Auth/img/blog/blog-3.jpg')}}" alt="blog thumb">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">
                                           Tip lựa chọn giày cho trẻ con 
                                        </a>
                                    </h5>
                                    <ul class="blog-meta">
                                        <li><span>By: </span>DJ Thành Đạt</li>
                                        <li><span>Lượt xem: </span>14.07.2029</li>
                                    </ul>
                                    <a href="blog-details.html" class="read-more">Đọc ngay...</a>
                                </div>
                            </div>
                            <!-- blog single item start -->

                            <!-- blog single item start -->
                            <div class="blog-post-item">
                                <div class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="{{URL::asset('Auth/img/blog/blog-3.jpg')}}" alt="blog thumb">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">
                                           Tip lựa chọn giày cho trẻ con 
                                        </a>
                                    </h5>
                                    <ul class="blog-meta">
                                        <li><span>By: </span>DJ Thành Đạt</li>
                                        <li><span>Lượt xem: </span>14.07.2029</li>
                                    </ul>
                                    <a href="blog-details.html" class="read-more">Đọc ngay...</a>
                                </div>
                            </div>
                            <!-- blog single item start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- latest blog area end -->

        <!-- brand area start -->
        <div class="brand-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-active-carousel">
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{URL::asset('Auth/img/brand/br1.png')}}" alt="brand image">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{URL::asset('Auth/img/brand/br2.png')}}" alt="brand image">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{URL::asset('Auth/img/brand/br3.png')}}" alt="brand image">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{URL::asset('Auth/img/brand/br4.png')}}" alt="brand image">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="#">
                                    <img src="{{URL::asset('Auth/img/brand/br5.png')}}" alt="brand image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
    </main>

@endsection