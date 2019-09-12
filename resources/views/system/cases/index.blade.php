<!-- index.blade.php -->
@extends('layouts.site')

@section('title') Disease Cases @endsection
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
	<h1>Disease Cases - {{ config('app.name') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        </li>
        <li class="{{ route('diseases.index') }}">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Records
            </a>
        </li>
        <li class="javascript:void(0)">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Cases
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
                        <i class="livicon" data-name="bug" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Disease Cases Records
                    </h3>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Case Name</th>
                                <th>Disease Record</th>
                                <th>Treatment</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Case Name</th>
                                <th>Disease Record</th>
                                <th>Treatment</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($cases as $case)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $case->case_name }}</td>
                                    <td>{{ App\Models\Disease::where('id',$case->disease_id)->first()->disease_name }}</td>
                                    <td>{{ $case->treatment_plan }}</td>
                                    <td><textarea class="form-control" style="border: none;">{{ $case->description }}</textarea></td>
                                    <td style="min-width: 100px;">
                                        <div class="row">
                                            <div class="col-md-6" style="padding: 1px;">
                                                <a href="{{ route('cases.show', $case->id) }}" class="btn btn-xs btn-block btn-info">Details</a>
                                            </div>
                                            <div class="col-md-6" style="padding: 1px;">
                                                <a href="{{ route('cases.edit', $case->id) }}" class="btn btn-xs btn-block btn-primary">Edit</a>
                                            </div>
                                        </div>
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
        				<a href="{{ route('cases.create') }}" class="btn btn-primary btn-block">Add New</a>
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