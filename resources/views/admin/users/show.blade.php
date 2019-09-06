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
    <div class="row">
        <div class="col-md-8">
            
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