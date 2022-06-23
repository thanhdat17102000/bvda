<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Adminto - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images') }}/favicon.ico">

    <!-- third party css -->
    @stack('styles')
    <!-- third party css end -->

    <link href="{{ asset('admin/assets/libs') }}/sweetalert2/sweetalert2.min.css" id="app-stylesheet" rel="stylesheet"
        type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" id="app-stylesheet"
        rel="stylesheet" type="text/css" />
        
    <link href="{{ asset('admin/assets/css') }}/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('admin/assets/css') }}/icons.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/css') }}/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admin/assets/images') }}/users/user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            Nowak <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="/admintrator/user" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{route('logout')}}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>
                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images') }}/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images') }}/logo-sm.png" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images') }}/logo-light.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images') }}/logo-sm.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">{{$data['title']}}</h4>
                </li>

            </ul>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ asset('admin/assets/images') }}/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown" aria-expanded="false">Nguyệt Võ</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="/admintrator/user" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>Tài khoản</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings mr-1"></i>
                                <span>Cài đặt</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock mr-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="{{route('logout')}}">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ route("dashboard.index") }}" class=" {{ $data['action'] === 'dashboard' ? 'active' : '' }} ">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Thống kê </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route("category-admin") }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Danh mục </span>
                            </a>
                        </li>
                        <li>
                            <a href="/admintrator/user">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Người dùng</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admintrator/post">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Bài viết</span>
                                <a href="{{ route('order') }}">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Quản lý đơn hàng </span>
                                    <a href="javascript: void(0);">
                                        <i class="mdi mdi-view-dashboard"></i>
                                        <span> Sản phẩm </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level mm-collapse" aria-expanded="false">
                                        <li><a href="{{ route('product.index') }}">Xem sản phẩm</a></li>
                                        <li><a href="{{ route('product.create') }}">Thêm sản phẩm</a></li>
                                    </ul>
                        </li>
                        <li>
                            <a href="{{ route("contact-admin") }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Phản hồi </span>
                            </a>
                        </li>
                        
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="{{ asset('admin/assets/css') }}/bootstrap-dark.min.css" data-appStyle="{{ asset('admin/assets/css') }}/app-dark.min.css" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="{{ asset('admin/assets/css') }}/app-rtl.min.css" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('admin/assets/images') }}/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="{{ asset('admin/assets/css') }}/bootstrap-dark.min.css" data-appStyle="{{ asset('admin/assets/css') }}/app-dark-rtl.min.css" />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

                <a href="https://1.envato.market/k0YEM" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="{{ asset('admin/assets/js') }}/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="{{ asset('admin/assets/libs') }}/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="{{ asset('admin/assets/libs') }}/morris-js/morris.min.js"></script>
    <script src="{{ asset('admin/assets/libs') }}/raphael/raphael.min.js"></script>

    <!-- Dashboard init js-->
    <script src="{{ asset('admin/assets/js') }}/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('admin/assets/js') }}/app.min.js"></script>

    <script src="{{ asset('admin/assets/libs')}}/sweetalert2/sweetalert2.min.js"></script>

    <script src="{{ asset('admin/assets/js')}}/pages/sweet-alerts.init.js"></script>

    <script src="{{ asset('admin/assets/js') }}/{{$data['action']}}.js"></script>

    <script src=https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>

    @stack('scripts')

</body>

</html>
