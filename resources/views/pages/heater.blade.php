@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 style="color: white; margin-top: 20px; margin-bottom: 25px">Konfigurasi Heater</h2>
        <form class="sign-up-form form" action="/login" method="post">
            @csrf
            <label class="form-label-wrapper">
              <p class="form-label">Username</p>
              <input class="form-input" type="text" value="Novatayudi" disabled name="name">
            </label>
            <label class="form-label-wrapper">
              <p class="form-label">Kode Device</p>
              <input class="form-input" type="text" placeholder="Masukan kode device" required name="kode_device">
            </label>
            <label class="form-label-wrapper">
              <p class="form-label">Minimal Temperature</p>
              <input class="form-input" type="text" placeholder="Masukan minimal temperature" required name="kode_device">
            </label>
            <label class="form-label-wrapper">
              <p class="form-label">Maximal Temperature</p>
              <input class="form-input" type="text" placeholder="Masukan minimal temperature" required name="kode_device">
            </label>
            <button class="form-btn primary-default-btn transparent-btn">Create</button>
        </form>
    </div>
@endsection