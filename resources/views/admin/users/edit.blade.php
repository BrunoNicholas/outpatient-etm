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
    <div class="row">
        <div class="col-md-8">
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
                    <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST" style="overflow-y: auto;">

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
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Name</label>
                                <div class="col-md-10">
                                    <input id="name" name="name" type="text" placeholder="Full names" class="form-control" autofocus value="{{ $user->name }}" required></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="email">E-mail</label>
                                <div class="col-md-10">
                                    <input id="email" name="email" value="{{ $user->email }}" type="text" placeholder="Enter valid email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="message">Gender</label>
                                <div class="col-md-10">
                                    <div class="form-control">
                                        <input type="radio" name="gender" value="Male" @if ($user->gender == 'Male')
                                            checked 
                                        @endif> Male 
                                        <input type="radio" name="gender" value="Female" @if ($user->gender == 'Female')
                                            checked 
                                        @endif> Female
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="message">Date of Birth</label>
                                <div class="col-md-10">
                                    <input id="date" name="date_of_birth" type="text" placeholder="{{ date('Y-m-d') }}" value="{{ $user->date_of_birth }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="message">Location</label>
                                <div class="col-md-10">
                                    <input id="text" name="location" value="{{ $user->location }}" type="text" placeholder="Kampala" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="message">Telephone</label>
                                <div class="col-md-10">
                                    <input id="text" name="telephone" type="text" value="{{ $user->telephone }}" placeholder="000000000" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="message">Designation</label>
                                <div class="col-md-10">
                                    <select name="role" class="form-control">
                                        <option value="{{ $user->role }}">Select to change role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="message">Account Status</label>
                                <div class="col-md-10">
                                    <input type="radio" name="status" value="Active" id="status1" @if ($user->status == 'Active')
                                        checked
                                    @endif> Active
                                    <input type="radio" name="status" value="Away" id="status2" @if ($user->status == 'Away')
                                        checked
                                    @endif> Away
                                    <input type="radio" name="status" value="Busy" id="status3" @if ($user->status == 'Busy')
                                        checked
                                    @endif> Busy
                                    <input type="radio" name="status" value="Blocked" id="status4" @if ($user->status == 'Blocked')
                                        checked
                                    @endif> Blocked
                                    <input type="radio" name="status" value="Other" id="status5" @if ($user->status == 'Other')
                                        checked
                                    @endif> Other
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-responsive btn-primary btn-sm">Update Profile</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="card-title"> <img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 30px; border-radius: 50%;"> User Profile Operations</h4>
                </div>
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ asset('files/profile/images/'.$user->profile_image) }}" alt="user image" style="max-width: 98%; border-radius: 3px;">
                        </div>
                        <hr>
                        @role(['super-admin','admin'])
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                            @if($user->id == Auth::user()->id) disabled @elseif($user->role == 'super-admin') disabled @endif onclick="return confirm('You are about to delete {{ $user->name }}\'s account!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
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
    
@endsection