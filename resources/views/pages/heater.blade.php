@extends('layouts.main')
@section('content')
    <div class="container">
      <div class="title-table" style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px;">
        <h2 style="color: white; margin-top: 20px; margin-bottom: 25px;">Konfigurasi Heater</h2>
        <a href="{{url('/heater/manual')}}">
          <button class="form-btn primary-default-btn transparent-btn">Mode manual</button>
        </a>
      </div>
      {{-- @session('succes')
        <h3 style="color: greenyellow">{{session('succes')}}</h3>  
      @endsession --}}
      <form class="sign-up-form form" action="{{url('/api/heater')}}" method="post">
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
            <p class="form-label">Minimal Temperature</p>
            <input class="form-input" type="text" placeholder="Masukan minimal temperature" required name="min_temp">
          </label>
          <label class="form-label-wrapper">
            <p class="form-label">Maximal Temperature</p>
            <input class="form-input" type="text" placeholder="Masukan minimal temperature" required name="max_temp">
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