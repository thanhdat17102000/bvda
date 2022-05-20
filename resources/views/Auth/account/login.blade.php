@extends('Auth.layouts.master')
@section('title')
    Đăng nhập
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
                            <h1 class="breadcrumb-title">Đăng nhập</h1>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-10 mx-auto">
                        <div class="login-reg-form-wrap">
                            <h2>Đăng nhập</h2>
                            <form action="#" method="post">
                                <div class="single-input-item">
                                    <input type="email" placeholder="Email/Tên đăng nhập" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" placeholder="Mật khẩu" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Ghi nhớ tài khoản</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                    </div>
                                </div>
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="single-input-item">
                                        <button class="btn">Đăng nhập</button>
                                    </div>
                                    <p>Chưa có tài khoản? <a href="/register" class="forget-pwd">Đăng ký</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->
                    </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</main>
<!-- main wrapper end -->

@endsection