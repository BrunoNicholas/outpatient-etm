<!-- site.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="sbnibro256@gmail.com">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('app/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <link href="{{ asset('app/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('app/css/pages/calendar_custom.css" rel="stylesheet" type="text/css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('app/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('app/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/pages/only_dashboard.css') }}" />
    @yield('styles')
</head>

<body class="skin-josh">
    @include('layouts.includes.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        @include('layouts.includes.side')
        <aside class="right-side">
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissable margin5">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <!-- Main content -->
            <section class="content-header">
                @yield('location')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('app/js/app.js') }}" type="text/javascript"></script>

    <script src="{{ asset('app/vendors/jquery.easy-pie-chart/js/easypiechart.min.js') }}"></script>
    <script src="{{ asset('app/vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('app/js/jquery.easingpie.js') }}"></script>
    <!--end easy pie chart -->
    @yield('scripts')
    <!--for calendar-->
    <script src="{{ asset('app/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/countUp.js/js/countUp.js') }}"></script>
    <script src="{{ asset('app/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('app/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('app/vendors/chartjs/Chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>    <!--  todolist-->
    <script src="{{ asset('app/js/pages/todolist.js') }}"></script>
    <script src="{{ asset('app/js/pages/dashboard.js') }}" type="text/javascript"></script>
</body>

</html>