@extends('layouts.site')

@section('title') Add Disease Record @endsection
@section('styles')
    <link href="{{ asset('app/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('location')
	<h1>Add New Disease Record To The System</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('home') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Home
            </a>
        </li>
        <li class="active">
            <a href="#">
                <i class="livicon" data-name="bug" data-size="14" data-color="#333" data-hovercolor="#333"></i> Disease Records
            </a>
        </li>
    </ol>
@endsection
@section('content')
    @include('layouts.includes.notifications')
    <div class="row ">
        <div class="col-md-9 col-sm-8">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Add New Disease Record
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('diseases.store') }}" method="post">
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
                                <label class="col-md-3 control-label" for="name">Disease Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="disease_name" type="text" placeholder="Your name" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="frequency" value="1">
                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control resize_vertical" id="message" name="description" placeholder="Describe the disease in few sentences." rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Disease Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status">
                                        <option value="Severe">Severe</option>
                                        <option value="Relatively Severe">Relatively Severe</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Not Severe">Not Severe</option>
                                        <option value="Minor">Minor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <div class="col-md-4 pull-right">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm btn-block">Add Disease Record</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-8">
            <div class="panel panel-danger filterable">
                <div class="panel-body text-center">
                    <div class="row">
                        <a href="{{ route('diseases.index') }}" class="btn btn-primary">Back</a>
                        <hr>
                        <a href="{{ route('home') }}" class="btn btn-default">Home</a>
                        <hr>
                        <a href="#" class="btn btn-default">Tracker</a>
                        <hr>
                        <a href="#" class="btn btn-default">Tracker</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('app/vendors/favicon/favicon.js') }}"></script>
    <script src="{{ asset('app/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('app/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('app/js/pages/form_examples.js') }}"></script>
@endsection