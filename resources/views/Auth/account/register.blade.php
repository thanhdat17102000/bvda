@extends('Auth.layouts.master')
@section('title')
    Đằng ký
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
                                    <h1 class="breadcrumb-title">Đăng ký</h1>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
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
                            <!-- Register Content Start -->
                            <div class="col-lg-10 mx-auto">
                                <div class="login-reg-form-wrap signup-form">
                                    <h2>Đăng ký</h2>
                                    <form action="#" method="post">
                                        <div class="single-input-item">
                                            <input type="text" placeholder="Họ và tên" required />
                                        </div>
                                        <div class="single-input-item">
                                            <input type="email" placeholder="Email" required />
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <input type="password" placeholder="Mật khẩu" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <input type="password" placeholder="Xác nhận mật khẩu" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-input-item">
                                            <div class="login-reg-form-meta">
                                                <div class="remember-meta">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                        <label class="custom-control-label" for="subnewsletter">Nhận thông báo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <div class="single-input-item">
                                                <button class="btn">Đăng ký</button>
                                            </div>
                                            <p>Đã có tài khoản? <a href="/login" class="forget-pwd">Đăng nhập</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Register Content End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- login register wrapper end -->
        </main>
        <!-- main wrapper end -->
    
@endsection