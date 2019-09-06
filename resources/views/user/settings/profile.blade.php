<!-- profile.blade.php -->
@extends('layouts.site')

@section('title') {{ Auth::user()->name }} - Profile @endsection
@section('styles')
	<link href="{{ asset('app/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('app/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('app/vendors/bootstrap-magnify/bootstrap-magnify.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('app/vendors/iCheck/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('app/css/pages/jquery.fs.boxer.min.css') }}" />
    <link href="{{ asset('app/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('location')
	<h1>My Account Profile</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="gear" data-size="14" data-color="#333" data-hovercolor="#333"></i> My Profile
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    @if($user->id == Auth::user()->id)
        <div class="row ">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" class="img-responsive user_image" alt="image" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new">
                                                Select image
                                            </span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="...">
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-striped" id="users">
                                <tr>
                                    <td>Names</td>
                                    <td> {{ Auth::user()->name }} </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> {{ Auth::user()->email }} </td>
                                </tr>
                                <tr>
                                    <td> Privilege </td>
                                    <td>{{ App\Models\Role::where('name',Auth::user()->role)->first()->display_name }}</td>
                                </tr>
                                <tr>
                                    <td> Phone Number </td>
                                    <td> {{ Auth::user()->telephone }} </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td> {{ Auth::user()->location }} </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td> {{ Auth::user()->status }} </td>
                                </tr>
                                <tr>
                                    <td>Joined</td>
                                    <td> {{ Auth::user()->created_at }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-tabs ul-edit responsive" style="width: 100%;">
                            <li class="active">
                                <a href="#tab-activity" data-toggle="tab">
                                    <i class="livicon" data-name="comments" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Notifications
                                </a>
                            </li>
                            <li>
                                <a href="#tab-messages" data-toggle="tab">
                                    <i class="livicon" data-name="mail" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i>Profile Image
                                </a>
                            </li>
                            <li>
                                <a href="#tab-change-pwd" data-toggle="tab">
                                    <i class="livicon" data-name="key" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Account Details
                                </a>
                            </li>
                            <li>
                                <a href="#tab-change-pwd2" data-toggle="tab">
                                    <i class="livicon" data-name="key" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Change Password
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-activity" class="tab-pane fade in active">
                                <div class="activity">
                                    <div class="imgs-profile">
                                    	<a class="pull-left" href="javascript:void(0)">
                                            <img class="media-object img-circle" src="{{ asset('images/favicon.png') }}" style="max-width: 35px;" alt="nice">
                                        </a>
                                        <div class="media-body">
                                            <strong>{{ config('app.name') }} : </strong> You Created Your Profile on <small class="text-muted"> {{ Auth::user()->created_at }} </small>
                                            <br>
                                            <p>
                                                Thanks for creating an account with {{ config('app.name') }}. We shall be giving you notifications here of any opportunities
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-change-pwd" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12 pd-top">

                                        <form action="{{ route('users.update', $user->id) }}" class="form-horizontal" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            @foreach ($errors->all() as $error)
                                                <p class="alert alert-danger"> {{ $error }} </p>
                                            @endforeach

                                            @if (session('success'))
                                                <div class="alert alert-success"> {{ session('success') }} </div>
                                            @endif

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Names
                                                        <span class='require text-danger'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="text" placeholder="Names" class="form-control" value="{{ $user->name }}" name="name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Email
                                                        <span class='require text-danger'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="text" name="email" placeholder="Names" class="form-control" value="{{ $user->email }}" placeholder="Do not change email. Account will be chaged completely!" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Gender
                                                        <span class='require text-danger'></span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="users-add" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <div class="form-control">
                                                                <input name="gender" type="radio" value="Male" @if($user->gender == 'Male') checked @endif> Male
                                                                <input type="radio" name="gender" value="Female" @if($user->gender == 'Female') checked @endif> Female
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Telephone Number
                                                        <span class='require text-danger'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="text" placeholder="077..." class="form-control" value="{{ $user->telephone }}" name="telephone" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Date of birth
                                                        <span class='require text-danger'></span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="user-add" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="date" placeholder="Age in number" class="form-control" value="{{ $user->date_of_birth }}" name="date_of_birth" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Location
                                                        <span class='require text-danger'></span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="text" placeholder="Kampala" class="form-control" value="{{ $user->location }}" name="location" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="role" value="{{ $user->role }}">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Account Status
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                        </span>
                                                        <div class="form-control">
                                                            <input type="radio" name="status" value="Active" id="status1" @if ($user->status == "Active")
                                                                checked 
                                                            @endif> Active
                                                            <input type="radio" name="status" value="Away" id="status1" @if ($user->status == "Away")
                                                                checked 
                                                            @endif> Away
                                                            <input type="radio" name="status" value="Busy" id="status1" @if ($user->status == "Busy")
                                                                checked 
                                                            @endif> Busy
                                                            <input type="radio" name="status" value="Blocked" id="status1" @if ($user->status == "Blocked")
                                                                checked 
                                                            @endif> Blocked
                                                            <input type="radio" name="status" value="Other" id="status1" @if ($user->status == "Other")
                                                                checked 
                                                            @endif> Other
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    &nbsp;
                                                    <input type="reset" class="btn btn-default hidden-xs" value="Reset">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div id="tab-messages" class="tab-pane fade in">
                                <table class="table table-striped table-advance table-hover web-mail" id="inbox-check">
                                    <tbody>
                                        <tr data-messageid="1" class="unread">
                                            <td class="view-message hidden-xs">
                                                <a href="view_mail.html">
                                                    <img src="{{ asset('images/favicon.png') }}" data-src="holder.js/25x25/#000:#fff" class="img-circle img-responsive pull-left" alt="Image" style="max-width: 35px;"> Admin </a>
                                            </td>
                                            <td class="view-message ">
                                                <a href="javascript:void(0)">
                                                    Thank you for being with {{ config('app.name') }}! <br>
                                                    Your profile is the identity to know you and serve you best. Please update it to see how we can work together.
                                                </a>
                                            </td>
                                            <td class="view-message inbox-small-cells">
                                                
                                            </td>
                                            <td class="view-message text-right">
                                                <a href="view_mail.html">{{ Auth::user()->created_at }}</a>
                                            </td>
                                        </tr>
                                        <div class="col-md-12">
                                            <hr>
                                            <h4 class="font-medium m-t-30 text-center"> Choose Update Profile Image </h4>
                                            <hr>
                                            <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6 text-center" style=" padding: 5px;">
                                                            <input type="file" name="profile_image" accept=".jpg, .png, .jpeg" class="pull-left">
                                                        </div>
                                                        <div class="col-md-6 text-right" style="padding: 5px;">
                                                            <button type="submit" class="btn btn-sm btn-success btn-rounded pull-right" >UPDATE IMAGE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab-change-pwd2" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12 pd-top">

                                        <form class="form-horizontal form-material" action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        {{-- method_field('PATCH') --}}
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger">{{ $error }}</p>
                                        @endforeach

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label class="col-md-12">Previous Password <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="Previously used password" name="previous_password" class="form-control form-control-line" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-md-12">New Password <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="Enter new password" name="password" class="form-control form-control-line" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control form-control-line" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-danger">Update Account Password</button>
                                            </div>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <div class="panel panel-danger text-center">
                                <div class="panel-heading">
                                    <h3>Are You a hacker??</h3>
                                </div>
                                <div class="panel-body">
                                    <p style="padding: 10px;">You are trying to access an account profile that is not yours. <br>
                                    Go back to you profile and access your own, fool!</p> <br>
                                    <p style="padding: 10px;"><a href="{{ route('home') }}" class="btn btn-danger btn-xs">Home</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script src="{{ asset('app/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/endors/jquery-mockjax/js/jquery.mockjax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/x-editable/js/bootstrap-editable.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('app/vendors/bootstrap-magnify/bootstrap-magnify.js') }}"></script>
    <script src="{{ asset('app/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('app/js/pages/jquery.fs.boxer.min.js') }}"></script>
    <script src="{{ asset('app/js/pages/user_profile.js') }}" type="text/javascript"></script>
    <script>
    $(".boxer").boxer();
    </script>
@endsection