@extends('layouts.site')

@section('title') Add Teams @endsection
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
	<h1>Add Medical Team - {{ config('app.name') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">
                <i class="livicon" data-name="users" data-size="14" data-color="#333" data-hovercolor="#333"></i> Users
            </a>
        </li>
        <li>
            <a href="{{ route('teams.index') }}">
                <i class="livicon" data-name="users-add" data-size="14" data-color="#333" data-hovercolor="#333"></i> Medical Teams
            </a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">
                <i class="livicon" data-name="plus" data-size="14" data-color="#333" data-hovercolor="#333"></i> New Teams
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-9 col-sm-8">
        	<div class="panel panel-info filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="livicon" data-name="users-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Medical Teams And Groups
                    </h3>
                    <span class="panel-title pull-right" style="margin-top: 0px;">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('teams.store') }}" method="post">
                        {{ csrf_field() }}

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
                                <label class="col-md-3 control-label" for="name">Team Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="team_name" type="text" placeholder="Enter disease case name" class="form-control" autofocus required>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Expected Total Members</label>
                                <div class="col-md-9">
                                    <input id="" name="team_members" type="number" placeholder="Enter expected number of team menbers" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Team Name</label>
                                <div class="col-md-9">
                                    <textarea name="description" type="text" placeholder="The team roles, description and more" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Team Status</label>
                                <div class="col-md-9">
                                    <div class="form-control">
                                        <input name="status" id="status1" name="radio" type="radio"  value="Active" > <label for="status1">Active</label>
                                        <input name="status" id="status2" name="radio" type="radio"  value="Approved" > <label for="status2">Approved</label>
                                        <input name="status" id="status3" name="radio" type="radio"  value="Blocked" > <label for="status3">Blocked</label>
                                        <input name="status" id="status4" name="radio" type="radio"  value="Not Active" > <label for="status4">Not Active</label>
                                        <input checked name="status" id="status5" name="radio" type="radio"  value="Pending" > <label for="status5">Pending</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <div class="col-md-4 pull-right">
                                        <button type="submit" class="btn btn-responsive btn-info btn-sm btn-block"><i class="fa-tick fa"></i> Add Team</button>
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
                        <a href="{{ route('teams.index') }}" class="btn btn-info btn-block">Back</a>
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