<!-- 404.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>You're Lost | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- global level js-->
    <link href="{{ asset('app/css/bootstrap.min.css" rel="stylesheet" type="text/css') }}" />
    <!-- end of globallevel js-->
    <!-- page level styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/pages/404.css') }}" />
    <!-- end of page level styles-->
</head>

<body>
    <div id="animate" class="row">
        <div class="number">4</div>
        <div class="icon"> <i class="livicon" data-name="pacman" data-size="105" data-c="#f6c500" data-hc="#f1b21d" data-eventtype="click" data-iteration="15"></i>
        </div>
        <div class="number">4</div>
    </div>
    <div class="hgroup">
        <h1>Page Not Found</h1>
        <h2>It seems that page you are looking for no longer exists.</h2>
        <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Home</a>
    </div>
    <!-- global js -->
    <script src="{{ asset('app/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/js/404.js') }}"></script>
    <!-- end of page level js-->
</body>
</html>