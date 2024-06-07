@extends('layouts.main')
@section('content')
<div class="container">
  <h2 style="color: white; margin-bottom: 20px; margin-top: 25px">Edit User</h2>
  <form class="sign-up-form form" action="{{url('/user')}}/{{$user->id}}" method="POST">
    @method('put')
    @csrf
    <label class="form-label-wrapper">
      <p class="form-label">Name</p>
      <input class="form-input" value="{{$user->name}}" type="text" placeholder="Masukan nama" value="{{old('name')}}" name="name" required>
    </label>
    <label class="form-label-wrapper">
      <p class="form-label">Email</p>
      <input class="form-input" value="{{$user->email}}" type="email" placeholder="Masukan email" value="{{old('email')}}" name="email" required>
    </label>
    <button type="submit" class="form-btn primary-default-btn transparent-btn">Edit</button>
  </form>
</div>
@endsection