<!-- index.blade.php -->
@extends('layouts.site')

@section('title') Stored Disease Records @endsection
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
	<h1>The Disease Records - {{ config('app.name') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Records
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-10 col-sm-8">
        	<div class="panel panel-danger filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="livicon" data-name="bug" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Disease Records
                    </h3>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Disease Name</th>
                                <th>Frequency</th>
                                <th>Disease Status</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Disease Name</th>
                                <th>Frequency</th>
                                <th>Disease Status</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        	<?php $i=0; ?>
                        	@foreach($diseases as $disease)
	                            <tr>
	                                <td>{{ ++$i }}</td>
	                                <td>{{ $disease->disease_name }}</td>
                                    <td>{{ $disease->frequency }}</td>
	                                <td>{{ $disease->status }}</td>
                                    <td><textarea class="form-control" style="border: none;">{{ $disease->description }}</textarea></td>
	                                <td style="width: 200px;">
	                                	<a href="{{ route('diseases.show', $disease->id) }}" class="btn btn-xs btn-info pull-left" style="min-width: 99px;">View</a>
	                                	<a href="{{ route('diseases.edit', $disease->id) }}" class="btn btn-xs btn-primary pull-right" style="min-width: 99px;">Edit</a>
	                                </td>
	                                
	                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-8">
        	<div class="panel panel-danger filterable">
        		<div class="panel-body text-center">
    				<div class="row">
        				<a href="{{ route('diseases.create') }}" class="btn btn-primary">Add New</a>
        				<hr>
        				<a href="{{ route('home') }}" class="btn btn-default">Home</a>
        				<hr>
        				<a href="#" class="btn btn-default">Tracker</a>
        				<hr>
        				<a href="#" class="btn btn-default">Tracker</a>
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