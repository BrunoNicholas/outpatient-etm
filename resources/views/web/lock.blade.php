<!-- lock.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Lock Screen | Josh Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('app/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" href="{{ asset('app/vendors/fort.js/css/fort.css') }}" />
    <link href="{{ asset('app/css/pages/lockscreen.css') }}" rel="stylesheet" />
    <!-- end of page level css -->
</head>

<body>
    <div class="top">
        <div class="colors"></div>
    </div>
    <div class="container">
        <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form method="POST" action="{{ route('unlock') }}" name="screen">
                    <div class="form">
                        <p class="form-control-static">@if(Auth::user()->name)  {{ $user->name }} @endif</p>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <button class="btn btn-info btn-block login" id="index" type="submit">Unlock</button>
                    </div>

                </form>
                <hr>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a> or <a  class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('app/js/app.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="{{ asset('app/vendors/fort.js/js/fort.js') }}"></script>
    <script src="{{ asset('app/js/pages/lockscreen.js') }}"></script>
    <!-- end of page level js-->
</body>

</html>
