{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-404-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 04:53:55 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Không tìm thấy trang!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('Error/assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{asset('Error/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('Error/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('Error/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('Error/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('Error/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden p-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="text-center">
                            <img src="{{asset('Error/assets/images/error400-cover.png')}}" alt="error img" class="img-fluid">
                            <div class="mt-3">
                                <h3 class="text-uppercase">Sorry, Page not Found 😭</h3>
                                <p class="text-muted mb-4">The page you are looking for not available!</p>
                                <a href="{{route('home')}}" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Quay về trang chủ!</a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth-page content -->
    </div>
    <!-- end auth-page-wrapper -->

</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-404-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 04:53:56 GMT -->
</html>
