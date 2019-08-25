<!-- nlogin.blade.php -->
@extends('layouts.auths')

@section('title') Login @endsection
@section('content')
<div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <img src="{{ asset('images/favicon.jpg') }}" alt="Logo" style="width: 50px;">
            <h3 class="panel-title text-center">Sign In | {{ config('app.name') }}</h3>
        </div>
        <div class="panel-body">
            <form accept-charset="UTF-8" role="form" method="POST" action="{{ route('login') }}">

                {{ csrf_field() }}

                <fieldset>
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('email') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="mail" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="Your E-mail" type="text"  name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('password') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="key" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                        </div>
                        <input class="form-control" type="password" placeholder="Your Password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal-blue"  name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block"> Sign In </button>
                </fieldset>
                <hr>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('password.request') }}" class="btn btn-md btn-warning btn-block">Forgort Password</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('register') }}" class="btn btn-md btn-info btn-block">Register</a>
                        </div>
                    </div>                    
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection