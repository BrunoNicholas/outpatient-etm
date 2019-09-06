@extends('layouts.auths')

@section('title') Register @endsection
@section('content')
<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <img src="{{ asset('images/favicon.jpg') }}" alt="Logo" style="width: 50px; border-radius: 5px;">
            <h3 class="panel-title text-center">Register - {{ config('app.name') }}</h3>
        </div>
        <div class="panel-body">
            <form accept-charset="UTF-8" role="form" method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}

                <fieldset>
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('name') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="Full Names" type="text"  name="name" value="{{ old('name') }}" required autofocus/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
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
                    
                    <div class="form-group input-group">
                        <div class="input-group-addon">
                            <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="Confirm Password" type="password"  name="password_confirmation" required />
                    </div>
                <!--
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('age') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <input class="form-control" placeholder="Age" type="number"  name="age" value="{{ old('age') }}" required autofocus/>
                        @if ($errors->has('age'))
                            <span class="help-block">
                                <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-addon{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                        </div>
                        <div class="form-control">
                            <input type="radio" name="gender" value="Male" checked="checked"> Male  
                            <input type="radio" name="gender" value="Female" checked="checked"> Female  
                        </div>                        
                    </div>

                    <input type="hidden" name="role" value="subscriber">

                    <input type="hidden" name="status" value="Pending">
                -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" value="Remember Me" class="minimal-blue"> I agree to the <a href="javascript:void(0)">Terms &amp; Conditions</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                </fieldset>
                <hr>
                <fieldset>
                    <a href="{{ route('login') }}" class="btn btn-md btn-info btn-block">Login</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection