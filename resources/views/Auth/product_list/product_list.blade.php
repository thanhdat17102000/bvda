@extends('Auth.layouts.master')
@section('title')
Danh sách sản phẩm
@endsection
@push('cssAuth')
<style>
    .active-favourite {
        color: #fff !important;
        background-color: #e3a51e !important;
    }
</style>
@endpush
@push('scripts')
<script>
    //Sản phẩm yêu thích FE của Yến
    $(document).ready(function() {
        $('.ion-android-favorite-outline').click(function(event) {
            event.preventDefault();
            var idProduct = $(this).data('id');
            $("#product-favourite-" + idProduct).addClass("active-favourite");
            $.ajax({
                type: "post",
                url: "/product-favourite",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'idProduct': idProduct,
                },
                success: function(response) {
                    // console.log(response);
                    // toastr.success('',
                    //     'Chọn sản phẩm yêu thích thành công')
                    if (response.status == 200) {
                        toastr.success('',
                            response.message)
                    } else {
                        toastr.success('',
                            response.message)
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });
    });

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

    // $('#add-favourite').submit(function(e) {
    //     e.preventDefault();
    //     var idProduct = $('#idProduct').val();
    //     console.log(idProduct);
    //     var idProduct = $('input[name=idProductFavourite]').val()
    //     console.log(idProduct);
    //     let user_id = $(this).data('id');
    //     console.log('user_id', user_id);
    //     $.ajax({
    //         type: "post",
    //         url: "/product-favourite",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             'idProduct': idProduct,
    //         },
    //         success: function(response) {
    //             console.log(response);
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // });

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
                                    @foreach($categories as $cate)
                                    <li><a href="{{URL::to('/product_list/'.$cate->id)}}">{{$cate->m_title}} <span>({{$cate->tongproduct->count()}})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <form action="{{route('locgia')}}" method="get">
                            @csrf
                            <div class="sidebar-single">
                                <div class="sidebar-title">
                                    <h3>Lọc theo giá</h3>
                                </div>
                                <div class="sidebar-body">

                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="0" data-max="2000000"></div>
                                        <div class="range-slider">
                                            <form action="#">
                                                <div class="price-input">
                                                    <label for="amount">giá: </label>
                                                        <input type="text" id="minamount" name="minamount">
                                                        <input type="text" id="maxamount" name="maxamount">
                                                </div>
                                                <button class="filter-btn">lọc</button>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <!-- <div class="sidebar-single">
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
                        </div> -->
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <!-- <div class="sidebar-single">
                            <div class="sidebar-title">
                                <h3>Kích cỡ</h3>
                            </div>
                            <div class="sidebar-body">
                                <ul class="size-list">
                                    <li><a href="#">size 33</a></li>
                                    <li><a href="#">size 34</a></li>
                                    <li><a href="#">size 35</a></li>
                                    <li><a href="#">size 36</a></li>
                                    <li><a href="#">size 37</a></li>
                                    <li><a href="#">size 38</a></li>
                                    <li><a href="#">size 39</a></li>
                                    <li><a href="#">size 40</a></li>
                                </ul>
                            </div>
                        </div> -->
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
                                            <a class="active" href="#" data-target="grid-view"><i class="fa fa-th"></i></a>
                                            <a href="#" data-target="list-view"><i class="fa fa-list"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-8 col-md-9 order-1 order-md-2">
                                    <div class="top-bar-right">
                                        <div class="product-short">
                                            <p>Sắp xếp : </p>
                                            <select class="nice-select sortne" id="sortne" name="sortne">
                                                <option value="{{Request::url()}}?danhsach=sanphamaz">Tên (A - Z)</option>
                                                <option value="{{Request::url()}}?danhsach=sanphamza">Tên (Z - A)</option>
                                                <option value="{{Request::url()}}?danhsach=giathapdencao">Giá (Thấp &gt; Cao)</option>
                                                <option value="{{Request::url()}}?danhsach=giacaodenthap">Giá (Cao &gt; Thấp)</option>
                                                <option value="{{Request::url()}}?danhsach=moicapnhat">Mới cập nhật</option>
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
                                            <img src="{{ asset('uploads') }}/{{ json_decode($showprd->m_picture)[0] }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="product-name">
                                            <a href="{{ route('productdetails', $showprd->m_product_slug) }}">{{ $showprd->m_product_name }}</a>
                                        </h5>
                                        <div class="price-box">
                                            <span class="price-regular">{{ number_format($showprd->m_original_price, 0, ',', '.') }}VND</span>
                                            <span class="price-old"><del>{{ number_format($showprd->m_price, 0, ',', '.') }}VND</del></span>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="javascript:void(0);" data-id="{{$showprd->id}}" id="product-favourite-{{$showprd->id}}" data-toggle="tooltip" title="Yên Thích"><i data-id="{{$showprd->id}}" class="ion-android-favorite-outline product-{{$showprd->id}}"></i></a>
                                            {{-- @foreach($list_favourite as $item)
                                                @if($item->id_product == $showprd->id)
                                                    <a href="javascript:void(0);" class="active-favourite" data-id="{{$showprd->id}}" id="product-favourite-{{$showprd->id}}" data-toggle="tooltip" title="Yên Thích"><i data-id="{{$showprd->id}}" class="ion-android-favorite-outline product-{{$showprd->id}}"></i></a>
                                                @elseif($item->id_product != $showprd->id)
                                                    <a href="javascript:void(0);" data-id="{{$showprd->id}}" id="product-favourite-{{$showprd->id}}" data-toggle="tooltip" title="Yên Thích"><i data-id="{{$showprd->id}}" class="ion-android-favorite-outline product-{{$showprd->id}}"></i></a>
                                                @else
                                                <a href="javascript:void(0);" data-id="{{$showprd->id}}" id="product-favourite-{{$showprd->id}}" data-toggle="tooltip" title="Yên Thích"><i data-id="{{$showprd->id}}" class="ion-android-favorite-outline product-{{$showprd->id}}"></i></a>
                                                @endif
                                            @endforeach --}}

                                            <a href="#" class="add-cart" data-toggle="tooltip" title="Thêm Vào Giỏa"><i class="ion-bag"></i></a>
                                            <form action="" method="post" class="cart-info">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="productId" value="{{ $showprd->id }}">
                                            </form>
                                            <a href="#" data-toggle="modal" data-target="#quick_view{{ $showprd->id }}">
                                                <span data-toggle="tooltip" title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- product grid item end -->

                                <!-- product list item start -->
                                <div class="product-list-item mb-30">
                                    <div class="product-thumb">
                                        <a href="{{ route('productdetails', $showprd->m_product_slug) }}">
                                            @if (json_decode($showprd->m_picture))
                                            <img src="{{ asset('uploads') }}/{{ json_decode($showprd->m_picture)[0] }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content-list">
                                        <h5 class="product-name">
                                        <a href="{{ route('productdetails', $showprd->m_product_slug) }}">{{ $showprd->m_product_name }}</a>
                                        </h5>
                                        <div class="price-box">
                                            <span class="price-regular">{{ number_format($showprd->m_original_price, 0, ',', '.') }}VND</span>
                                            <span class="price-old"><del>{{ number_format($showprd->m_price, 0, ',', '.') }}VND</del></span>
                                        </div>
                                        <p>{!!$showprd->m_short_description!!}</p>
                                        <div class="product-link-2 position-static">
                                            <a href="#" data-toggle="tooltip" title="Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                            <a href="#" data-toggle="tooltip" title="Thêm Vào Giỏa"><i class="ion-bag"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#quick_view{{$showprd->id}}">
                                                <span data-toggle="tooltip" title="Xem Nhanh"><i class="ion-ios-eye-outline"></i></span> </a>
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
            <br>
            
            <!-- page main wrapper end -->
</main>
<!-- main wrapper end -->
<!-- Quick view modal start -->
@foreach ($showproduct as $key => $showprd)
<div class="modal" id="quick_view{{ $showprd->id }}">
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
                                    @if(json_decode($showprd->m_picture))
                                        @foreach(json_decode($showprd->m_picture) as $showimg)
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{asset('uploads')}}/{{$showimg}}" alt="" />
                                            </div>
                                        @endforeach
                                    @endif
                            </div>
                            <div class="pro-nav slick-row-5">
                                    @if(json_decode($showprd->m_picture))
                                        @foreach(json_decode($showprd->m_picture) as $showimg)
                                            <div class="pro-nav-thumb"><img src="{{asset('uploads')}}/{{$showimg}}" alt="" /></div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-7">
                                <div class="product-details-des">
                                    <h3 class="pro-det-title">{{$showprd->m_product_name}}</h3>
                                    <div class="pro-review">
                                        <span><a href="#">1 bình luận</a></span>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">{{number_format($showprd->m_original_price,0,',','.')}}VND</span>
                                        <span class="price-old"><del>{{number_format($showprd->m_price,0,',','.')}}VND</del></span>
                                    </div>
                                    <p>{!!$showprd->m_short_description!!}</p>
                                    <div class="quantity-cart-box d-flex align-items-center mb-20">
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <a href="cart.html" class="btn btn-default">Thêm vào giỏa hàng</a>
                                    </div>
                                    <div class="availability mb-20">
                                        <h5 class="cat-title">Tình trạng: </h5>
                                        @if($showprd->m_buy > 0)
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
        jQuery(document).ready(function($) {
        $('.sortne').change(function() {
            var url = $(this).val();
            // alert(url);
            if(url){
                window.location = url;
            }
            return false;
        });
        locdanhsach();
        function locdanhsach() {
            var url = window.location.href;
            $('select[name="sortne"]').find('option[value="'+url+'"]').attr("selected",true);
        }
    });
</script>
@endsection

