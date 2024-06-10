@extends('layouts.main')
@section('content')
  <div class="container">
    <div class="title-table" style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px;">
      <h2 style="color: white; margin-top: 20px; margin-bottom: 25px;">Konfigurasi Lampu</h2>
      <a href="{{url('/lampu/manual')}}">
        <button class="form-btn primary-default-btn transparent-btn">Mode manual</button>
      </a>
    </div>

    <form class="sign-up-form form" action="{{url('/api/lampu')}}" method="post">
        @csrf
        <label class="form-label-wrapper">
          <p class="form-label">Username</p>
          <input class="form-input" type="text" value="{{Auth::user()->name}}" disabled>
        </label>
        <p class="form-label">Pilih kode device!</p>
        <div class="dropdown-device">
          <input type="text" class="text03" readonly placeholder="Pilih kode device" name="kode">
          <div class="option">
            @foreach ($allKode as $kode)
              <div onmouseover="show('{{$kode->kode}}')">{{$kode->kode}}</div>  
            @endforeach
          </div>
        </div>
        <label class="form-label-wrapper">
          <p class="form-label">Lamp on</p>
          <input type="time" class="form-input" name="lamp_on">
        </label>          
        <label class="form-label-wrapper">
          <p class="form-label">Lamp off</p>
          <input type="time" class="form-input" name="lamp_off">
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