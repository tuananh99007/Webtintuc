<!DOCTYPE html>
<!-- saved from url=(0028)https://www.nguoiduatin.vn/# -->
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bài-3-Home Tạp chí điện tử Người đưa tin, cập nhật 24h - Đọc báo tin tức mới nhất trong ngày</title>
    <link rel="stylesheet" href="{{ asset('assets/users/css/desktop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/users/css/style.css') }}">
    <script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
</head>

<body class="isDesktop h-100 d-flex flex-column homepage home" aria-hidden="false" style="padding: 0px;">
@include('users.layout.header')
@include('users.layout.menu')
@yield('main_contentHome')
@include('users.layout.footer')

</body>


</html>
