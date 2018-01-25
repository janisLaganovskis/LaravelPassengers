@extends('layouts.master')

@section('content')
    @include('includes.returnmessageblock')
    
    
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
              
                    <form action="{{ route('dashboard') }}" method="get">
                    
                    <button type="submit" class="btn btn-primary">Dashboard</button>
                   
                </form>        
            </div>
        </section>             
    
    
 <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3> My sign-ups</h3></header>
           @foreach($signups as $signup)
                <article class="post" data-postid="{{ $signup->id }}">
                    <p>
                       {{ $signup->post->body }} 
                    </p> 
                    <div class="info">
                       Brauc: {{ $signup->post->user->name }} {{ $signup->post->user->lastName }}, User ID {{ $signup->post->user->id }}
                    </div>
                               
                </article>
                @endforeach   
        </div>
    </section>
    
 

@endsection