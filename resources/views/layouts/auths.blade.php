<!-- auths.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('app/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('app/css/pages/login2.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet" />
    <!-- styles of the page ends-->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            @yield('content')
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('app/js/app.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="{{ asset('app/js/TweenLite.min.js') }}"></script>
    <script src="{{ asset('app/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/js/pages/login2.js') }}" type="text/javascript"></script>
    <!-- end of page level js-->
</body>

</html>
