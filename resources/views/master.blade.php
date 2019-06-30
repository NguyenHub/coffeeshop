<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Begin SEO -->

    <!-- Primary Meta Tags -->
    <title>STU Coffee</title>
    <base href="{{ asset('') }}">
    <meta name="title" content="STU Coffee">
    <meta name="description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
    <meta property="og:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta property="og:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
    <meta property="og:image" content="assets/img/slider/slider-2.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
    <meta property="twitter:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
    <meta property="twitter:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
    <meta property="twitter:image" content="assets/img/slider/slider-2.jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- End SEO -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/chosen.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header start -->
    @include('header')
    @yield('content')
@include('footer')

<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
@yield('script')
</body>
</html>
