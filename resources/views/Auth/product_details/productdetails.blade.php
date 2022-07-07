@extends('Auth.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area bg-img" data-bg="{{URL::asset('Auth/img/banner/breadcrumb-banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap text-center">
                        <nav aria-label="breadcrumb">
                            <h1 class="breadcrumb-title">Cửa hàng</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="shop.html">Cửa hàng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- product details wrapper start -->
    <div class="product-details-wrapper section-padding">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            @foreach($showproductdetailget as $showdetail)
                            <div class="col-lg-5">
                                <div class="product-large-slider mb-20">
                                    @if(json_decode($showdetail->m_picture))
                                        @foreach(json_decode($showdetail->m_picture) as $showimg)
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{asset('uploads')}}/{{$showimg}}" alt="" />
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pro-nav slick-row-5">
                                    @if(json_decode($showdetail->m_picture))
                                        @foreach(json_decode($showdetail->m_picture) as $showimg)
                                            <div class="pro-nav-thumb"><img src="{{asset('uploads')}}/{{$showimg}}" alt="" /></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="pro-det-title">{{$showdetail->m_product_name}}</h3>
                                    <div class="pro-review">
                                        <span><a href="#">1 đánh giá</a></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="regular-price">{{number_format($showdetail->m_price,0,',','.')}}VND</span>
                                        <span class="old-price"><del>{{number_format($showdetail->m_original_price,0,',','.')}}VND</del></span>
                                    </div>
                                    <p>{!!$showdetail->m_short_description!!}</p>
                                    <div class="quantity-cart-box d-flex align-items-center mb-20">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <a href="cart.html" class="btn btn-default">Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="color-option mb-20">
                                        <h5 class="cat-title">Màu sắc :</h5>
                                        <ul>
                                            <li>
                                                <a class="c-black" href="#" title="Black"></a>
                                            </li>
                                            <li>
                                                <a class="c-blue" href="#" title="Blue"></a>
                                            </li>
                                            <li>
                                                <a class="c-brown" href="#" title="Brown"></a>
                                            </li>
                                            <li>
                                                <a class="c-gray" href="#" title="Gray"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pro-size mb-20">
                                        <h5 class="cat-title">Kích thước :</h5>
                                        <select class="nice-select">
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                        </select>
                                    </div>
                                    <div class="availability mb-20">
                                        <h5 class="cat-title">Tình trạng:</h5>
                                        @if($showdetail->m_buy > 0)
                                        <span>Còn hàng</span>
                                        @else
                                        <span style="color:red">Hết hàng</span>
                                        @endif
                                    </div>
                                    <div class="share-icon">
                                        <h5 class="cat-title">Chia sẻ:</h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#tab_one">Mô tả</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_two">Thông tin</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_three">Bình luận</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        @foreach($showproductdetailget as $showdetail)
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.</p> -->
                                                <div class="review-description">
                                                    <div class="tab-thumb">
                                                        @if(json_decode($showdetail->m_picture))
                                                        <img src="{{asset('uploads')}}/{{json_decode($showdetail->m_picture)[0]}}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="tab-des">
                                                        <h3>Thông tin sản phẩm :</h3>
                                                        <ul>
                                                            <li>Thuộc sản phẩm : {{$showdetail->showdanhmuc->m_title}}</li>
                                                            <li>{{$showdetail->m_product_name}}</li>
                                                            <li>Giá mặc định :{{number_format($showdetail->m_price,0,',','.')}}VND</li>
                                                            <li>Giá giảm : {{number_format($showdetail->m_original_price,0,',','.')}}VND</li>
                                                            <li>@if($showdetail->m_buy > 0)
                                                                <span>Còn hàng</span>
                                                                @else
                                                                <span>Hết hàng</span>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>{!!$showdetail->m_description!!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="tab-pane fade" id="tab_two">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Màu sắc</td>
                                                        <td>black, blue, red</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kích thước</td>
                                                        <td>L, M, S</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            <form action="#" class="review-form">
                                                <h5>1 bình luận: <span>Chaz Kangeroo Hoodies</span></h5>
                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="{{URL::asset('Auth/img/about/avatar.jpg')}}" alt="">
                                                    </div>
                                                    <div class="review-box">
                                                        <div class="ratings">
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                        <div class="post-author">
                                                            <p><span>admin -</span> 30 Nov, 2018</p>
                                                        </div>
                                                        <p>Aliquam fringilla euismod risus ac bibendum. Sed sit amet sem varius ante feugiat lacinia. Nunc ipsum nulla, vulputate ut venenatis vitae, malesuada ut mi. Quisque iaculis, dui congue placerat pretium, augue erat accumsan lacus</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Họ và tên</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Email</label>
                                                        <input type="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Nội dung</label>
                                                        <textarea class="form-control" required></textarea>
                                                        <div class="help-block pt-10"><span class="text-danger">Ghi chú:</span> HTML is not translated!</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Đánh giá</label>
                                                        &nbsp;&nbsp;&nbsp; Tệ&nbsp;
                                                        <input type="radio" value="1" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="2" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="3" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="4" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="5" name="rating" checked>
                                                        &nbsp;Rất tốt
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="sqr-btn" type="submit">Tiếp tục</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- product details reviews end --> 

                    <!-- featured product area start -->
                    <section class="Related-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-title text-center">
                                        <h2 class="title">Sản phẩm liên quan</h2>
                                        <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-carousel-4 mbn-50 slick-row-15 slick-arrow-style">
                                        <!-- product single item start -->
                                        @foreach($showproductrelated as $showrelated)
                                        <div class="product-item mb-50">
                                            <div class="product-thumb">
                                                <a href="product-details.html">
                                                    @if(json_decode($showrelated->m_picture))
                                                        <img src="{{asset('uploads')}}/{{json_decode($showrelated->m_picture)[0]}}" alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h5 class="product-name">
                                                    <a href="product-details.html">{{$showrelated->m_product_name}}</a>
                                                </h5>
                                                <div class="price-box">
                                                    <span class="price-regular">{{number_format($showrelated->m_price,0,',','.')}}VND</span>
                                                    <span class="price-old"><del>{{number_format($showrelated->m_original_price,0,',','.')}}VND</del></span>
                                                </div>
                                                <div class="product-action-link">
                                                    <a href="#" data-toggle="tooltip" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    <a href="#" data-toggle="tooltip" title="Thêm vào giỏ hàng"><i class="ion-bag"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#quick_view{{$showrelated->id}}"> <span data-toggle="tooltip"
                                                        title="Xem nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- product single item start -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- featured product area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- product details wrapper end -->
</main>
<!-- main wrapper end -->
    <!-- Quick view modal start -->
    @foreach($showproductrelated as $showrelated)
    <div class="modal" id="quick_view{{$showrelated->id}}">
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
                                    @if(json_decode($showrelated->m_picture))
                                        @foreach(json_decode($showrelated->m_picture) as $showimg)
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{asset('uploads')}}/{{$showimg}}" alt="" />
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pro-nav slick-row-5">
                                    @if(json_decode($showrelated->m_picture))
                                        @foreach(json_decode($showrelated->m_picture) as $showimg)
                                            <div class="pro-nav-thumb"><img src="{{asset('uploads')}}/{{$showimg}}" alt="" /></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="pro-det-title">{{$showrelated->m_product_name}}</h3>
                                    <div class="pro-review">
                                        <span><a href="#">1 bình luận</a></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">{{number_format($showrelated->m_original_price,0,',','.')}}VND</span>
                                        <span class="price-old"><del>{{number_format($showrelated->m_price,0,',','.')}}VND</del></span>
                                    </div>
                                    <p>{!!$showrelated->m_short_description!!}</p>
                                    <div class="quantity-cart-box d-flex align-items-center mb-20">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <a href="cart.html" class="btn btn-default">Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="availability mb-20">
                                        <h5 class="cat-title">Tình trạng: </h5>
                                        @if($showrelated->m_buy > 0)
                                        <span>Còn hàng</span>
                                        @else
                                        <span style="color:red">Hết hàng</span>
                                        @endif
                                    </div>
                                    <div class="share-icon">
                                        <h5 class="cat-title">Chia sẻ:</h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
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
    @endforeach
    <!-- Quick view modal end -->



@endsection