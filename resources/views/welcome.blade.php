@extends('layouts.master')

@section('title')
    Welcome
@endsection

@section('content')
    @include('includes.returnmessageblock')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-Mail adress</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}">
                </div>
                <div class="form-group{{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="last_name">Last name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                </div>
                  <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password_confirmation">Repeat password</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token()}}"> </input>
            </form>
        </div>   
        <div class="col-md-6">
           <h3>Sign In</h3>
           <form action="{{ route('signin') }}" method="post">
               <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                   <label for="email">E-Mail adress</label>
                   <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
               </div>            
               <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                   <label for="password">Password</label>
                   <input class="form-control" type="password" name="password" id="password">
               </div>            
               <button type="submit" class="btn btn-primary">Submit</button>
               <input type="hidden" name="_token" value="{{ Session::token()}}"> </input>
           </form>
       </div> 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                              <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
                            </div>
                        </div>
    </div>
@endsection
