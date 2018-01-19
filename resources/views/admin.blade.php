@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    You are logged in as <strong>ADMIN</strong>
                </div>
            </div>
            
     <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3> All users</h3></header>
           @foreach($users as $user)
                <article class="user" data-postid="{{ $user->id }}">
                    <p>
                       {{ $user->name }} {{ $user->lastName }} {{ $user->email }}
                    </p> 
                                         
                    <div class="interaction">
                                                
                        <a href="{{ route('user.edit', ['user_id' => $user->id]) }}">Edit</a>
                        |<a href=" {{ route('user.delete', ['user_id' => $user->id]) }} ">Delete</a>
                        
                    </div>                
                </article>
                @endforeach   
        </div>
    </section>
        </div>
    </div>
</div>
@endsection
