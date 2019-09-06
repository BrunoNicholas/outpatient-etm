<!-- index.blade.php -->
@extends('layouts.site')

@section('title') System Roles @endsection
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
	<h1>The System Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin') }}">
                <i class="livicon" data-name="dashboard" data-size="14" data-color="#333" data-hovercolor="#333"></i> Admin Dashboard
            </a>
        </li>
        <li class="active">
            <a>
                <i class="livicon" data-name="warning" data-size="14" data-color="#333" data-hovercolor="#333"></i> Roles
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading clearfix  ">
                    <div class="panel-title pull-left">
                        <div class="caption">
                            <i class="livicon" data-name="users" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i> All System Roles
                        </div>
                    </div>
                    <div class="tools pull-right"></div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody><!-- {{ $i=0 }}-->
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td style="text-align: center;" class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-raised block btn-success btn-xs" data-toggle="modal"  href="#ajax{{ $role->id }}modal">Details</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-raised block btn-warning btn-xs" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade in" id="ajax{{ $role->id }}modal" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Role {{ $role->id }} Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <div class="bs-example">
                                                        <ul class="nav nav-tabs" style="margin-bottom: 15px; width: 100%;">
                                                            <li class="active">
                                                                <a href="#hom{{ $role->id }}e" data-toggle="tab">Profile Details</a>
                                                            </li>
                                                            <li>
                                                                <a href="#profil{{ $role->id }}e" data-toggle="tab">Role Access Description</a>
                                                            </li>
                                                            <li class="disabled">
                                                                <a>All Activity</a>
                                                            </li>
                                                        </ul>
                                                        <div id="myTabContent" class="tab-content">
                                                            <div class="tab-pane fade active in" id="hom{{ $role->id }}e">
                                                                <div class="row">
                                                                    <div class="col-md-12" style="margin: 1px;">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray;">
                                                                            Name : 
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            {{ $role->name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 1px;">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray;">
                                                                            Display Name : 
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            {{ $role->display_name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 1px;">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray;">
                                                                            Description : 
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            {{ $role->description }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 1px;">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray;">
                                                                            Recent Update : 
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            {{ $role->updated_at }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 1px;">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray;">
                                                                            Date Created : 
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            {{ $role->created_at }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="profil{{ $role->id }}e">
                                                                <div class="row">
                                                                    <p>Sorry, This Feature is still under development!</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                            <button type="button" class="btn btn-danger pull-left">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
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