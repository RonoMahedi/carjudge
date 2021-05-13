@extends('layouts.frontend.header')

@section('title')
Car Judge - {{ $user->name }}'s Profile
@endsection

@section('content')
<br><br>
<section class="profile py-5">

<div class="row">
  <div class="col-12">
    <h1 style="text-align:center;">{{ $user->name }}'s Profile</h1>
  </div>
</div>



<div class="row mt-5">
  <div class="col-4 mx-auto">
    <label>Name</label><br>
    <p>{{ $user->name }}</p>
    <hr>
    <label>Email</label><br>
    <p>{{ $user->email }}</p>
    <hr>
    <label>Phone</label><br>
    <p>{{ $user->phone }}</p>
    <hr>
  </div>
</div>

<div class="row mt-">
  <div class="col-12 text-center">
      <a href="{{ route('edit.profile', Auth::user()->id ) }}" class="btn btn-info ">Edit Profile</a>
      <a href="{{ route('change.password', Auth::user()->id ) }}" class="btn btn-info">Change Password</a>
  </div>
</div>


</section>

@endsection
