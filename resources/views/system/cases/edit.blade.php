@extends('layouts.site')

@section('title') Edit Disease Case Records @endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/colReorder.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/rowReorder.bootstrap.c') }}ss">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/scroller.bootstrap.css') }}" />
@endsection
@section('location')
	<h1>The Diseases Stored In The System</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li class="{{ route('diseases.index') }}">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Records
            </a>
        </li>
        <li class="{{ route('cases.index') }}">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Cases
            </a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Edit Case Record
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-9 col-sm-8">
            <div class="panel panel-danger" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit Disease Record
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('cases.update',$case->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Disease Case Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="case_name" value="{{ $case->case_name }}" type="text" placeholder="Enter disease case name" class="form-control" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Select Disease</label>
                                <div class="col-md-9">
                                    <select name="disease_id" class="form-control">
                                        <option value="{{ $case->disease_id }}">Select to change disease record</option>
                                        @foreach($diseases as $disease)
                                            <option value="{{ $disease->id }}" title="{{ $disease->description }}">{{ $disease->disease_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Treatment Plan</label>
                                <div class="col-md-9">
                                    <input id="tretmt" name="treatment_plan" value="{{ $case->treatment_plan }}" type="text" placeholder="Enter treament plan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Case Id</label>
                                <div class="col-md-9">
                                    <input id="caseid" name="case_id" value="{{ $case->case_id }}" type="text" placeholder="Enter case ID" class="form-control">
                                </div>
                            </div>
                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control resize_vertical" id="message" name="description" placeholder="Describe the disease case in few sentences." rows="5">{{ $case->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Disease Case Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="{{ $case->status }}">Select to change status</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Under Investigation">Under Investigation</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Done">Done</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <div class="col-md-4 pull-right">
                                        <button type="submit" class="btn btn-responsive btn-danger btn-sm btn-block"><i class="fa-done fa"></i> Update Disease Case Record</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-8">
            <div class="panel panel-danger filterable">
                <div class="panel-body text-center">
                    <div class="row">
                        <a href="{{ route('cases.index') }}" class="btn btn-danger btn-block">Back</a>
                        <hr>
                        <a href="{{ route('home') }}" class="btn btn-default btn-block">Home</a>
                        <hr>
                        <a href="#" class="btn btn-default btn-block">Tracker</a>
                        <hr>
                        <a href="#" class="btn btn-default btn-block">Tracker</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
	<script type="text/javascript" src="{{ asset('app/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/jeditable/js/jquery.jeditable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/buttons.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/datatables/js/dataTables.scroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/js/pages/table-advanced.js') }}"></script>
@endsection