<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Internal Error | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ asset('app/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('app/css/pages/500.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10 middle">
            <div class="error-container">
                <div class="error-main">
                    <h1> <i class="livicon" data-name="warning" data-s="100" data-c="#ffbc60" data-hc="#ffbc60" data-eventtype="click" data-iteration="15" data-duration="2000"></i>
                        403
                    </h1>
                    <h3>
                        Access Denied!.
                        <br>
                        You have insufficient permissions to access this.
                    </h3>
                        <a href="{{ route('home') }}" class="btn btn-warning">Home</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('app/js/app.js') }}" type="text/javascript"></script>
    <script>
    $("document").ready(function() {
        setTimeout(function() {
            $(".livicon").trigger('click');
        }, 10);
    });
    // code for aligning center
    $(document).ready(function() {
        var x = $(window).height();
        var y = $(".middle").height();
        //alert(x);
        x = x - y;
        x = x / 2;
        $(".middle").css("padding-top", x);
    });
    </script>
</body>
</html>