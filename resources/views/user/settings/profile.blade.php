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
    @if($user->id == Auth::user()->id)
        <div class="row ">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ asset('images/favicon.png') }}" class="img-responsive user_image" alt="image" />
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
                                    <td>
                                        {{ Auth::user()->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        {{ Auth::user()->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Phone Number
                                    </td>
                                    <td>
                                        {{ Auth::user()->telephone }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>
                                        {{ Auth::user()->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        {{ Auth::user()->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>
                                        {{ Auth::user()->created_at }}
                                    </td>
                                </tr>
                                <!-- 
                                <tr>
                                    <td>Profile</td>
                                    <td>
                                        
                                    </td>
                                </tr> -->
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
                                    <i class="livicon" data-name="mail" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i>Messages
                                </a>
                            </li>
                            <li>
                                <a href="#tab-change-pwd" data-toggle="tab">
                                    <i class="livicon" data-name="key" data-size="16" data-c="#01BC8C" data-hc="#01BC8C" data-loop="true"></i> Change Account Details
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-activity" class="tab-pane fade in active">
                                <div class="activity">
                                    <div class="imgs-profile">
                                    	<a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="{{ asset('images/favicon.png') }}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <strong>{{ config('app.name') }} : </strong> You Created Your Profile.
                                            <br>
                                            <small class="text-muted">
                                                {{ Auth::user()->created_at }}
                                            </small>
                                                            
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
                                                            <input type="text" name="email" placeholder="Names" class="form-control" value="{{ $user->email }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Password
                                                        <span class='require text-danger'>*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="password" name="password" placeholder="Password" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Confirm Password
                                                        <span class='require text-danger'></span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="password" placeholder="Confirm Password" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Age
                                                        <span class='require text-danger'></span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="user-add" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                            <input type="number" placeholder="Age in number" class="form-control" value="{{ $user->age }}" name="age" />
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
                                                                <input name="gender" type="radio" value="Male" @if($user->gender == 'Male') checked="checked" @endif> Male
                                                                <input type="radio" name="gender" value="Female" @if($user->gender == 'Female') checked="checked" @endif> Female
                                                            </div>
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
                                            </div>

                                            <input type="hidden" name="role" value="{{ $user->role }}">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Account Status
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                        </span>
                                                        <select name="status" class="form-control">
                                                            <option value="Active"> Active </option>
                                                            <option value="Not Active"> Not Active </option>
                                                            <option value="Frozen"> Frozen </option>
                                                            <option value="Pending"> Pending </option>
                                                        </select>
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
                                            <td style="width:4%;" class="inbox-small-cells">
                                                <div class="checker ">
                                                    <span>
                                                        <input type="checkbox" class="mail-checkbox custom-checkbox" checked="checked" disabled></span>
                                                </div>
                                            </td>
                                            <td class="inbox-small-cells">
                                                <i class="livicon" data-n="star-full" data-s="15"></i>
                                            </td>
                                            <td class="view-message hidden-xs">
                                                <a href="view_mail.html">
                                                    <img src="#" data-src="holder.js/25x25/#000:#fff" class="img-circle img-responsive pull-left" alt="Image"> Admin </a>
                                            </td>
                                            <td class="view-message ">
                                                <a href="#">
                                                    Welcome to {{ config('app.name') }}! Please finish setting up your account so that we can know you more.
                                                </a>
                                            </td>
                                            <td class="view-message inbox-small-cells">
                                                
                                            </td>
                                            <td class="view-message text-right">
                                                <a href="view_mail.html">{{ Auth::user()->created_at }}</a>
                                            </td>
                                        </tr>
                                        @foreach($chats as $chat)
                                            <tr data-messageid="2" class="unread">
                                                <td class="inbox-small-cells">
                                                    <div class="checker">
                                                        <span>
                                                            <input type="checkbox" name="replied" checked="checked" class="mail-checkbox custom-checkbox"  >
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="inbox-small-cells">
                                                    <i class="livicon" data-n="star-full" data-s="15"></i>
                                                </td>
                                                <td class="view-message hidden-xs" style="min-width: 150px;">
                                                    <a href="#">
                                                        <img src="#" data-src="holder.js/25x25/#000:#fff" class="img-circle img-responsive pull-left" alt="Image">{{ (\App\User::where('id', $chat->receiver_id)->first())->name }}
                                                    </a>
                                                </td>
                                                <td class="view-message">
                                                    <a href="view_mail.html">
                                                        {{ $chat->description }}
                                                    </a>
                                                </td>
                                                <td class="view-message inbox-small-cells">
                                                    <a href="#" class="livicon" data-name="info" data-size="14" data-color="#333" title="View Details" data-toggle="modal" data-target="#showModal{{ $chat->id }}"></a>
                                                </td>
                                                <td class="view-message text-right" style="min-width: 100px;">
                                                    <a href="#">{{ $chat->created_at }}</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="showModal{{ $chat->id }}" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title" id="modalLabelfade">Message {{ $chat->id }} Details</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            From
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->sen_name }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12" style="border-bottom: thin solid #e5e5e5;">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            Sender Email
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->sen_email }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            Message Topic
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->topic }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px
                                                                        ;">
                                                                            Message Details
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->description }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12" style="border-top: thin solid #e5e5e5;">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            Sent To
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            @if($chat->receiver_id == Auth::user()->id) You @else {{ (\App\User::where('id', $chat->receiver_id)->first())->name }} @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            Sender's Designation
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->sending_profile }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            Receiver's Designation
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->receiving_profile }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-right" style="border-right: thin solid gray; padding: 5px;">
                                                                            Date &amp; Time Sent
                                                                        </div>
                                                                        <div class="col-md-8 text-center">
                                                                            {{ $chat->created_at }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn  btn-primary" data-dismiss="modal">Close!</button>
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