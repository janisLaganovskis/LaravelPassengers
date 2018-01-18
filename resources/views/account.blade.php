@extends('layouts.master')

@section('title')
    Account  
@endsection


@section('content')
        <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h4>Your Account</h4></header>
            <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">
                </div>
                
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" name="lastName" class="form-control" value="{{ $user->lastName }}" id="lastName">
                </div>

                <div class="form-group">
                    <label for="profile_picture">Profile picture (only .jpg)</label>
                    <input type="file" name="profile_picture" class="form-control" id="profile_picture">
                </div>

                <button type="submit" class="btn btn-primary">Update account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

    @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpg'))

        <section class="row new-post">

            <div class="col-md-6 col-md-offset-3">

                <img src="{{ route('account.profile_picture', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">

            </div>

        </section>

    @endif
  
@endsection