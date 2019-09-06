@extends('layouts.auths')

@section('title') Reset Your Password @endsection
@section('content')
<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <img src="{{ asset('images/favicon.jpg') }}" alt="Logo" style="width: 50px; border-radius: 5px;">
            <h3 class="panel-title text-center">Reset Password - {{ config('app.name') }}</h3>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form accept-charset="UTF-8" role="form" method="POST" action="{{ route('password.email') }}">

                {{ csrf_field() }}

                <fieldset>
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('email') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="mail" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="E-mail" type="email"  name="email" value="{{ old('email') }}" required/>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif                        
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Send Password Reset Link</button>
                </fieldset>
                <hr>
                <fieldset>
                    <a href="{{ route('login') }}" class="btn btn-md btn-info btn-block">Remember Password</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection