<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>@yield('title')</title>
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="{{URL::asset('img/favicon.ico')}}" type="image/x-icon" />
    <!--=== All Plugins CSS ===-->
    <link href="{{URL::asset('css/plugins.css')}}" rel="stylesheet">
    <!--=== All Vendor CSS ===-->
    <link href="{{URL::asset('css/vendor.css')}}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <!-- Modernizer JS -->
    <script src="{{URL::asset('js/modernizr-2.8.3.min.js')}}"></script>

    <!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    @include('Auth.components.header')
    @yield('content')
    @include('Auth.components.footer')
    <!--=======================Javascript============================-->
    <!--=== All Vendor Js ===-->
    <script src="{{URL::asset('js/vendor.js')}}"></script>
    <!--=== All Plugins Js ===-->
    <script src="{{URL::asset('js/plugins.js')}}"></script>
    <!--=== Active Js ===-->
    <script src="{{URL::asset('js/active.js')}}"></script>
</body>
    
</html>