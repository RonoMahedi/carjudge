@extends('layouts.frontend.header')

@section('title')
Car Judge - {{ $user->name }}'s Profile
@endsection

@section('content')
<br><br>
<section class="profile py-5">

    <div class="row">
        <div class="col-12">
            <h1 style="text-align:center;">Edit {{ $user->name }}'s Profile</h1>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-4 mx-auto">
          <!-- Error message -->
          @if ($errors->any())
          <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
          </div>
          @endif

            <form action="{{ route('update.profile') }}" method="post">
              @csrf
                <label>Name</label><br>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                <hr>
                <label>Email</label><br>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                <hr>
                <label>Phone</label><br>
                <input type="number" name="phone" class="form-control" min="11" value="{{ $user->phone }}">
                <hr>
                {{-- <small>If you want to change password Only then field below</small>
                <label>Change Password</label><br>
                <input type="password" name="password" class="form-control">
                <hr>
                <label>Change Password</label><br>
                <input type="password" name="password_confirmation" class="form-control">
                <hr> --}}


        </div>
    </div>


    <div class="row mt-">
      <div class="col-12 text-center">
          <button type="submit" class="btn btn-success">Update</button>

      </form>
      <a href="{{ route('user.profile', Auth::user()->id ) }}" class="btn btn-danger">Cancel</a>

      </div>
    </div>


</section>

@endsection
