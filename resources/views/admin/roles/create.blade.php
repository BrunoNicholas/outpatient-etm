@extends('layouts.site')

@section('title') Create New Role @endsection
@section('styles')
	
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
        <li>
            <a href="{{ route('users.index') }}">
                <i class="livicon" data-name="warning" data-size="14" data-color="#333" data-hovercolor="#333"></i> Roles
            </a>
        </li>
        <li class="active">
            <a>
                <i class="livicon" data-name="plus" data-size="14" data-color="#333" data-hovercolor="#333"></i> Add Role
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-danger" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Add New Role
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('roles.store') }}" method="POST" style="max-height: 450px; overflow-y: auto;">

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
                                <label class="col-md-3 control-label" for="name">Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text" placeholder="Names" class="form-control" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Display Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="display_name" type="text" placeholder="Names" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Description</label>
                                <div class="col-md-9">
                                    <textarea id="description" name="description" placeholder="Role Description" class="form-control" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label"> Permissions <span class="text-danger">*</span></label>
                                <div class="col-md-9" style="max-height: 200px; overflow-y: auto;">
                                    @foreach($permissions as $perm)
                                        <input type="checkbox" name="permission[]" value="{{ $perm->id }}"> {{ $perm->display_name }} <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <div class="row">
                                        <div class="col-md-3 pull-right">
                                            <button type="submit" class="btn btn-responsive btn-primary btn-sm btn-block">Create Role</button>
                                        </div>
                                        <div class="col-md-3 pull-right">
                                            <a href="{{ route('roles.index') }}" class="btn btn-responsive btn-success btn-sm btn-block">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel box-v4 text-center">
                <div class="panel-body">
                    <h4 class="panel-title">  User Role Operations </h4>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-block"> User Roles </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin') }}" class="btn btn-primary btn-block"> Admin </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    
@endsection