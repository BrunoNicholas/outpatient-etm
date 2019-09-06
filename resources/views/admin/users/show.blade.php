@extends('layouts.site')

@section('title') User Details @endsection
@section('styles')
	
@endsection
@section('location')
	<h1>User Details</h1>
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
            <a>
                <i class="livicon" data-name="list" data-size="14" data-color="#333" data-hovercolor="#333"></i> User Details
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
	@role(['super-admin','admin','subscriber'])
		@include('notify')
	@endrole

@endsection
@section('scripts')
    
@endsection