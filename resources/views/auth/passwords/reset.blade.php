@extends('layouts.auths')

@section('title') Reset-Password @endsection
@section('content')
<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Reset Password | {{ config('app.name') }}</h3>
        </div>
        <div class="panel-body">
            <form accept-charset="UTF-8" role="form" method="POST" action="{{ route('password.request') }}">

                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

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
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('password') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="Password" name="password" type="password" required />

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="input-group-addon">
                            <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="Confirm Password" type="password"  name="password_confirmation" required />

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
            </form>
        </div>
    </div>
</div>
@endsection