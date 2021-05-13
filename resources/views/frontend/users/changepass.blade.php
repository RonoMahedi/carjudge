@extends('layouts.frontend.header')

@section('title')
Car Judge - {{ $user->name }}'s Profile Password Change
@endsection

@section('content')
<br><br>
<section class="profile py-5">

    <div class="row">
        <div class="col-12">
            <h1 style="text-align:center;">Change {{ $user->name }}'s Profile Password</h1>
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

            <form action="{{ route('update.pass') }}" method="post">
              @csrf

                <label>Current Password</label><br>
                <input type="password" name="oldpassword" class="form-control">
                <hr>
                <label>New Password</label><br>
                <input type="password" name="password" class="form-control">
                <hr>
                <label>Confirm New Password</label><br>
                <input type="password" name="password_confirmation" class="form-control">
                <hr>


        </div>
    </div>


    <div class="row mt-">
      <div class="col-12 text-center">
          <button type="submit" class="btn btn-success">Change Password</button>

      </form>
      <a href="{{ route('user.profile', Auth::user()->id ) }}" class="btn btn-danger">Cancel</a>

      </div>
    </div>


</section>

@endsection
