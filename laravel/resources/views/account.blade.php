@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Profile</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
            @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
                <section class="row new-post">
                    <div class="col-md-6 col-md-offset-3" id="pic">
                        <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
                    </div>
                </section>
            @endif
            <br/>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" id="last_name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="email">
                </div>
                <div class="form-group">
                    <label for="first_name">Password</label>
                    <input type="text" name="password" class="form-control"  id="password">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="phone">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="pink-button">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

@endsection