<!-- index.blade.php -->
@extends('layouts.site')

@section('title') Admin Dashbord @endsection
@section('styles')
	<link href="{{ asset('app/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('app/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('app/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('app/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('app/vendors/modal/css/component.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/css/pages/advmodals.css') }}" rel="stylesheet" />
@endsection
@section('location')
	<h1>Administrator | {{ Auth::user()->name }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="dashboard" data-size="14" data-color="#333" data-hovercolor="#333"></i> Admin Dashboard
            </a>
        </li>
    </ol>
@endsection
@section('content')
	@include('layouts.includes.admin_notify')
	@include('layouts.includes.notifications')
	<div class="row">
	    <div class="col-lg-8">
	        <ul class="nav  nav-tabs ">
	            <li class="active">
	                <a href="#tab1" data-toggle="tab">
	                	<i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
	                	Users
	                </a>
	            </li>
	            <li>
	                <a href="#tab2" data-toggle="tab">
	                    <i class="livicon" data-name="lock" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
	                    System Roles
	                </a>
	            </li>
	            <li>
	                <a href="#tab3" data-toggle="tab">
	                    <i class="livicon" data-name="gear" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
	                    System
	                </a>
	            </li>
	        </ul>
	        <div class="tab-content mar-top">
	            <div id="tab1" class="tab-pane fade active in">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="portlet box default">
	                            <div class="portlet-title" style="margin-top: 2px;">
	                                <div class="caption">
	                                    <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> System Users
	                                </div>
	                            </div>
	                            <div class="portlet-body">
	                                <div class="table-scrollable">
	                                    <table class="table table-striped table-bordered table-advance table-hover">
	                                        <thead>
	                                            <tr>
	                                            	<th>#</th>
	                                                <th class="text-left">
	                                                    <i class="livicon" data-name="pencil" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Name
	                                                </th>
	                                                <th class="hidden-xs text-left">
	                                                    <i class="livicon" data-name="pencil" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Email
	                                                </th>
	                                                <th class="text-left">
	                                                    <i class="livicon" data-name="plus" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Role
	                                                </th>
	                                                <th class="text-left">
		                                                <i class="livicon" data-name="warning" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Action
		                                            </th>
	                                            </tr>
	                                        </thead>
	                                        <tbody><!-- {{ $i=0 }} -->
	                                        	@foreach($users as $user)
	                                        		@if($i <= 5)
			                                            <tr>
			                                            	<td>{{ ++$i }}</td>
			                                                <td>{{ $user->name }}</td>
			                                                <td>{{ $user->email }}</td>
			                                                <td>{{ 'user' }}</td>
			                                                <td>
			                                                    <a href="#" class="btn default btn-xs green-stripe" data-toggle="modal" data-target="#showModal{{ $user->id }}">View</a>
			                                                </td>
			                                            </tr>
			                                            <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="showModal{{ $user->id }}" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
												            <div class="modal-dialog" role="document">
												                <div class="modal-content">
												                    <div class="modal-header bg-primary">
												                        <h4 class="modal-title" id="modalLabelfade">{{ $user->name }} Details</h4>
												                    </div>
												                    <div class="modal-body">
												                    	<div class="row">
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Name
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->name }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Age
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->age }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Gender
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->gender }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Email
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->email }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Telephone
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->telephone }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Location
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->location }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Designation
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->role }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Account Status
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->status }}
										                                    		</div>
										                                    	</div>
										                                    </div>
										                                    <div class="col-md-12">
										                                    	<div class="row">
										                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
										                                    			Date Created
										                                    		</div>
										                                    		<div class="col-md-8 text-center">
										                                    			{{ $user->created_at }}
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
												     @endif
	                                            @endforeach
	                                        </tbody>
	                                    </table>
	                                </div>
	                                <div class="col-md-4"><a href=""><button class="btn btn-info btn-block">Details</button></a></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div id="tab2" class="tab-pane fade">
	                <div class="row">
	                    <div class="col-md-12 pd-top" style="padding-top: 2px;">
	                        <div class="panel">
	                            <div class="panel-heading" style="padding-top: 0px; padding-bottom: 0px; height: 40px;">
	                            	<div  class="panel-title" style="background: #a5a5a5; padding: 3px; height: 100%; font-size: 20px;">
		                                <i class="livicon" data-name="warning" data-size="20" data-loop="true" data-c="#fff" data-hc="white"></i> System Roles
		                            </div>
	                            </div>
	                            <div class="panel-body">
	                                <div class="col-md-12">	                                    
		                                <div class="table-scrollable">
		                                    <table class="table table-striped table-bordered table-advance table-hover">
		                                        <thead>
		                                            <tr>
		                                            	<th>#</th>
		                                                <th class="text-left">
		                                                    <i class="livicon" data-name="pencil" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Name
		                                                </th>
		                                                <th class="hidden-xs text-left">
		                                                    <i class="livicon" data-name="pencil" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Display Name
		                                                </th>
		                                                <th class="text-left">
		                                                    <i class="livicon" data-name="plus" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Description
		                                                </th>
		                                                <th class="text-left">
			                                                <i class="livicon" data-name="warning" data-size="16" data-c="#666666" data-hc="#666666" data-loop="true"></i> Action
			                                            </th>
		                                            </tr>
		                                        </thead>
		                                        <tbody><!-- {{ $i=0 }} -->
		                                        	@foreach($roles as $role)
		                                        		@if($i <= 4)
				                                            <tr>
				                                            	<td>{{ ++$i }}</td>
				                                                <td>{{ $role->name }}</td>
				                                                <td>{{ $role->display_name }}</td>
				                                                <td>{{ $role->description }}</td>
				                                                <td>
				                                                    <a href="#" class="btn default btn-xs green-stripe" data-toggle="modal" data-target="#show{{ $role->id }}Modal">View</a>
				                                                </td>
				                                            </tr>
				                                            <div class="modal fade slideExpandUp" id="show{{ $role->id }}Modal" role="dialog" aria-labelledby="Modallabel3dsign">
													            <div class="modal-dialog" role="document">
													                <div class="modal-content">
													                    <div class="modal-header bg-info ">
													                        <h4 class="modal-title" id="Modallabel3dsign">Role {{ $role->id }} Details</h4>
													                    </div>
													                    <div class="modal-body">
													                    	<div class="row">
											                                    <div class="col-md-12">
											                                    	<div class="row">
											                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
											                                    			Name
											                                    		</div>
											                                    		<div class="col-md-8 text-center">
											                                    			{{ $role->name }}
											                                    		</div>
											                                    	</div>
											                                    </div>
											                                    <div class="col-md-12">
											                                    	<div class="row">
											                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
											                                    			Display
											                                    		</div>
											                                    		<div class="col-md-8 text-center">
											                                    			{{ $role->display_name }}
											                                    		</div>
											                                    	</div>
											                                    </div>
											                                    <div class="col-md-12">
											                                    	<div class="row">
											                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
											                                    			Description
											                                    		</div>
											                                    		<div class="col-md-8 text-center">
											                                    			{{ $role->description }}
											                                    		</div>
											                                    	</div>
											                                    </div>
											                                    <div class="col-md-12">
											                                    	<div class="row">
											                                    		<div class="col-md-4 text-right" style="border-right: thin solid gray;">
											                                    			Date Created
											                                    		</div>
											                                    		<div class="col-md-8 text-center">
											                                    			{{ $role->created_at }}
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
													    @endif
													@endforeach
		                                        </tbody>
		                                    </table>
		                                </div>
		                                @role(['super-admin'])
		                                	<div class="col-md-4 pull-right"><a href="{{ route('roles.index') }}"><button class="btn btn-warning btn-block">Details</button></a></div>
		                                @endrole
	                                </div>
	                            </div>
	                        </div>                        
	                    </div>
	                </div>
	            </div>
	            <div id="tab3" class="tab-pane fade">
	                <div class="row">
	                    <div class="col-md-12 pd-top">
	                        <div class="panel">
	                            <div class="panel-heading">
	                                
	                            </div>
	                            <div class="panel-body">
	                                <div class="col-md-12">
	                                    
	                                	<p>Feature Still Under Development</p>

	                                </div>
	                            </div>
	                        </div>                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
@section('scripts')
	<script src="{{ asset('app/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/jquery-mockjax/js/jquery.mockjax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/vendors/x-editable/js/bootstrap-editable.js') }}" type="text/javascript"></script>
	<script src="{{ asset('app/js/pages/user_profile.js') }}" type="text/javascript"></script>
@endsection