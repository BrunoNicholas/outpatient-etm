@extends('layouts.site')

@section('title') Edit User {{ $user->id }} Details @endsection
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
        <li>
            <a href="{{ route('users.index') }}">
                <i class="livicon" data-name="users" data-size="14" data-color="#333" data-hovercolor="#333"></i> Users
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="users-add" data-size="14" data-color="#333" data-hovercolor="#333"></i> Add Users
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
	@role(['super-admin','admin','subscriber'])
		@include('notify')
	@endrole

    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-warning" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit {{ $user->name }}'s Details
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST" style="max-height: 350px; overflow-y: auto;">

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
                                <label class="col-md-3 control-label" for="name">Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text" placeholder="Names" value="{{ $user->name }}" class="form-control" autofocus required></div>
                            </div>
                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">E-mail</label>
                                <div class="col-md-9">
                                    <input id="email" name="email" type="text" value="{{ $user->email }}" placeholder="mail@example.com" class="form-control" required></div>
                            </div>
                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Age</label>
                                <div class="col-md-9">
                                    <input id="number" name="age" type="text" value="{{ $user->age }}" placeholder="54" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Location</label>
                                <div class="col-md-9">
                                    <input id="text" name="location" type="text" value="{{ $user->location }}" placeholder="Kampala" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Telephone</label>
                                <div class="col-md-9">
                                    <input id="text" name="telephone" type="text" value="{{ $user->telephone }}" placeholder="0782 000000" class="form-control" required>
                                </div>
                            </div>

                            <input type="hidden" name="password" value="{{ bcrypt('dollar') }}">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Gender</label>
                                <div class="col-md-9">
                                <div class="form-control">
                                    <input type="radio" name="gender" value="Male"@if($user->gender == 'Male') checked="checked"  @endif> Male 
                                    <input type="radio" name="gender" value="Female"@if($user->gender == 'Female') checked="checked"  @endif> Female
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Designation (Role)</label>
                                <div class="col-md-9" style="padding: 0px;">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="text" value="{{ $user->role }}" class="form-control">
                                        </div>
                                        <div class="col-md-8">
                                            <select name="role" class="form-control">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Account Status</label>
                                <div class="col-md-9" style="padding: 0px;">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <input type="text" value="{{ $user->status }}" class="form-control">
                                        </div>
                                        <div class="col-md-8">
                                            <select name="status" class="form-control">
                                                <option value="Active"> Active </option>
                                                <option value="Not Active"> Not Active </option>
                                                <option value="Frozen"> Frozen </option>
                                                <option value="Pending"> Pending </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-responsive btn-primary btn-sm">Update User Profile</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    
@endsection