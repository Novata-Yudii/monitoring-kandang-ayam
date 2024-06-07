@extends('layouts.main')
@section('content')
<div class="container">
  <h2 style="color: white; margin-bottom: 20px; margin-top: 25px">Tambah User</h2>
  <form class="sign-up-form form" action="{{url('/user')}}" method="post">
    @csrf
    <label class="form-label-wrapper">
      <p class="form-label">Name</p>
      <input class="form-input" type="text" placeholder="Masukan nama" value="{{old('name')}}" name="name" required>
      @error('name')
          <p style="color: red">{{$message}}</p>
      @enderror
    </label>
    <label class="form-label-wrapper">
      <p class="form-label">Email</p>
      <input class="form-input" type="email" placeholder="Masukan email" value="{{old('email')}}" name="email" required>
      @error('email')
          <p style="color: red">{{$message}}</p>
      @enderror
    </label>
    <label class="form-label-wrapper">
      <p class="form-label">Password</p>
      <input class="form-input" type="password" placeholder="Masukan password" required name="password">
      @error('password')
          <p style="color: red">{{$message}}</p>
      @enderror
    </label>
    <button type="submit" class="form-btn primary-default-btn transparent-btn">Create</button>
  </form>
</div>
@endsection