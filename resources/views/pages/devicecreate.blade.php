@extends('layouts.main')
@section('content')
<div class="container">
  <h2 style="color: white; margin-bottom: 20px; margin-top: 25px">Tambah Device</h2>
  <form class="sign-up-form form" action="{{url('/device')}}" method="POST">
    @csrf
    <p class="form-label">Masukan user yang sudah terdaftar</p>
    <div class="dropdown-device">
      <input type="text" class="text03" readonly placeholder="Pilih username" name="name">
      <div class="option">
        @foreach ($users as $user)
          <div onmouseover="show('{{$user->name}}')">{{$user->name}}</div>  
        @endforeach
      </div>
    </div>
    <label class="form-label-wrapper">
      <p class="form-label">Kode device</p>
      <input class="form-input" type="text" placeholder="Masukan kode device" name="kode">
    </label>
    <label class="form-label-wrapper">
      <p class="form-label">Keterangan</p>
      <input class="form-input" type="text" placeholder="Masukan keterangan device" name="keterangan">
    </label>
    <button type="submit" class="form-btn primary-default-btn transparent-btn">Create</button>
  </form>
</div>
<script>
  let dropdown = document.querySelector(".dropdown-device");
    dropdown.onclick = function () {
    dropdown.classList.toggle("active");
  };

  function show(a) {
    document.querySelector(".text03").value = a;
  }
</script>
@endsection