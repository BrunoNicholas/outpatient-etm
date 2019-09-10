@extends('layouts.site')

@section('title') Project Tasks @endsection
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
	<h1>Project Tasks - {{ config('app.name') }}</h1>
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
            <a href="{{ route('users.index') }}">
                <i class="livicon" data-name="users" data-size="14" data-color="#333" data-hovercolor="#333"></i> Medical Projects
            </a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">
                <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Project Tasks
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-10 col-sm-8">
        	<div class="panel panel-warning filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="livicon" data-name="tree" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Project Tasks &amp; Description
                    </h3>
                    <span class="panel-title pull-right" style="margin-top: 0px;">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Case Reference</th>
                                <th>Description</th>
                                <th>Date Started</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>Case Reference</th>
                                <th>Description</th>
                                <th>Date Started</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($tasks as $task)


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-8">
        	<div class="panel panel-success filterable">
        		<div class="panel-body text-center">
    				<div class="row">
        				<a href="{{ route('tasks.create') }}" class="btn btn-warning btn-block">Add New</a>
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
