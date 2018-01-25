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
            <header><h3> Signed up users:</h3></header>
           @foreach($signups as $signup)
                <article class="post" data-postid="{{ $signup->id }}">
                    <p>
                       {{ $signup->post->body }} 
                    </p> 
                    <div class="info">
                       Pieteicies: {{ $signup->user->name }} {{ $signup->user->lastName }}, User ID {{ $signup->user->id }}
                    </div>
                               
                </article>
                @endforeach   
        </div>
    </section>
    
 

@endsection