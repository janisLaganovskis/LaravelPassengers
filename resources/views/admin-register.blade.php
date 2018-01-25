@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Signup</div>
                <div class="panel-body">
                  <!--  <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form> -->
                  
                    <form action="{{ route('signupAdmin') }}" method="post">
                                        <div class="top-row">    
                       <div class="field-wrap{{ $errors->has('name') ? 'has-error' : '' }}">
                           <label for="name">Name</label>
                           <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}">
                       </div>
                       <div class="field-wrap{{ $errors->has('last_name') ? 'has-error' : '' }}">
                           <label for="last_name">Last name</label>
                           <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                       </div>
                        </div>

                           <div class="field-wrap {{ $errors->has('email') ? 'has-error' : '' }}">
                               <label for="email">E-Mail address</label>
                               <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                           </div>

                         <div class="field-wrap{{ $errors->has('password') ? 'has-error' : '' }}">
                           <label for="password">Password</label>
                           <input class="form-control" type="password" name="password" id="password">
                       </div>
                       <div class="field-wrap{{ $errors->has('password') ? 'has-error' : '' }}">
                           <label for="password_confirmation">Repeat password</label>
                           <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                       </div>

                       <button type="submit" class="button button-block"><h4>Submit</h4></button>
                       <input type="hidden" name="_token" value="{{ Session::token()}}"> </input>
                   </form>
                  
                </div>  
                <div>
                       <form action="{{ route('admin.login') }}" method="get"> 
                       <button type="submit" class="button button-block"><h4>Log in</h4></button>
                       
                   </form>
                </div>        
                
            </div>
        </div>
    </div>
</div>
@endsection
