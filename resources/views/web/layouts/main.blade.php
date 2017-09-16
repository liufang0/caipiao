<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $_system_config->keyword }}">
    <link rel="stylesheet" href="{{ asset('/web/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <script src="{{ asset('/web/js/jquery-2.1.3.min.js') }}"></script>
</head>
<body>

@include('web.layouts.header')

@yield('content')
@include('web.layouts.aside')
@include('web.layouts.footer')

<script src="{{ asset('/web/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('/web/js/index1.js') }}"></script>
<script src="{{ asset('/web/js/jquery.SuperSlide.2.1.1.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/js/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('/web/js/jquery.fly.min.js') }}"></script>
<script src="{{ asset('/web/js/common.js') }}"></script>
<script src="{{ asset('/web/js/common1.js') }}"></script>
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>