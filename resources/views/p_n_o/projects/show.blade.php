@extends('layouts.site')

@section('title') View Projects @endsection
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/colReorder.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/rowReorder.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/buttons.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app/vendors/datatables/css/scroller.bootstrap.css') }}" />
@endsection
@section('location')
	<h1> View Medical Projects - {{ config('app.name') }}</h1>
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
            <a href="{{ route('projects.index') }}">
                <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Medical Projects
            </a>
        </li>
        <li class="active">
            <a href="javascript:void(0)">
                <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> Edit Project
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-9 col-sm-8">
        	<div class="panel panel-success filterable">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        <i class="livicon" data-name="users-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Edit Project
                    </h3>
                    <span class="panel-title pull-right" style="margin-top: 0px;">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Validity/Reference</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @if($project->project_name)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Medical Project Name: </b></td>
                                    <td>{{ $project->project_name }}</td>
                                    <td class="text-center">Required for identity</td>
                                </tr>
                            @endif
                            @if($project->disease_case_id)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Medical Team Members: </b></td>
                                    <td>{{ $project->disease_case_id }} Members</td>
                                    <td class="text-center"><a target="_blank" href="{{ route('cases.show',$project->disease_case_id) }}"><button class="btn btn-xs btn-danger">View Case</button></a></td>
                                </tr>
                            @endif
                            @if($project->description)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Project Description: </b></td>
                                    <td><textarea rows="5" class="form-control" style="border: none; background-color: #fff;">{{ $project->description }}</textarea></td>
                                    <td class="text-center">Required for clarity</td>
                                </tr>
                            @endif
                            @if($project->start_date)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Project Start Date: </b></td>
                                    <td>{{ $project->start_date }}</td>
                                    <td class="text-center">Required for clarity</td>
                                </tr>
                            @endif
                            @if($project->end_date)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Project End Date: </b></td>
                                    <td>{{ $project->end_date }}</td>
                                    <td class="text-center">Required for clarity</td>
                                </tr>
                            @endif
                            @if($project->status)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td class="text-center"><b>Project Status: </b></td>
                                    <td>{{ $project->status }}</td>
                                    <td class="text-center">Required for clarity</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="card-title text-center"> Operations | {{ config('app.name') }} </h4>
                    <h6 class="card-subtitle"></h6>
                    @role(['super-admin','admin'])
                        <hr />
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info btn-block">Edit Record</a>
                    @endrole
                    <div class="row text-center">
                        <hr>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('projects.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                            onclick="return confirm('You are about to delete this project record!\nThis is not reversible!')" title="Delete project record completely"> Delete </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endrole
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