@extends('layouts.master')

@section('content')
    @include('includes.returnmessageblock')
    @if(Auth::user()->isDriver)
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h3> Specify where you are driving and for how much?</h3></header>
                    <form action="{{ route('post.create') }}" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" name="_token" value="{{ Session::token()}}"> </input>
                </form>        
            </div>
        </section>             
    @endif
    
 <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3> All routes</h3></header>
           @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p>
                       {{ $post->body }} 
                    </p> 
                    <div class="info">
                       Posted by {{ $post->user->name }} {{ $post->user->lastName }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        @if(!(Auth::user()->isDriver))
                        <a href="#" class="signupPost">Sign up</a>   
                        @endif
                        @if(Auth::user() == $post->user)
                        |<a href="#" class="edit">Edit</a>
                            |<a href=" {{ route('post.delete', ['post_id' => $post->id]) }} ">Delete</a>
                        @endif
                    </div>                
                </article>
                @endforeach   
        </div>
    </section>
    
    <div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="post-body">Edit the Post</label>
                  <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>               
              </div>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit')}}';
        var urlSignup = '{{ route('signupPost')}}';
    </script>

@endsection