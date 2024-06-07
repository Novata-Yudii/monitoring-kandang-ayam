@extends('layouts.main')
@section('content')
<div class="container">
  <h2 style="color: white; margin-bottom: 20px; margin-top: 25px">Edit Device</h2>
  <form class="sign-up-form form" action="{{url('/device')}}/{{$device->id}}" method="POST">
    @method('put')
    @csrf
    <label class="form-label-wrapper"> 
      <p class="form-label">Name</p>
      <input class="form-input" value="{{$device->user->name}}" type="text" disabled placeholder="Masukan name" value="{{old('name')}}" name="name" required>
    </label>
    <label class="form-label-wrapper">
      <p class="form-label">Device kode</p>
      <input class="form-input" value="{{$device->kode}}" type="text" placeholder="Masukan device kode" value="{{old('kode')}}" name="kode" required>
    </label>
    <label class="form-label-wrapper">
      <p class="form-label">Keterangan</p>
      <input class="form-input" value="{{$device->device_name}}" type="text" placeholder="Masukan keterangan" value="{{old('device_name')}}" name="keterangan" required>
    </label>
    <button type="submit" class="form-btn primary-default-btn transparent-btn">Edit</button>
  </form>
</div>
@endsection