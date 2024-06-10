@extends('layouts.main')
@section('content')
<main class="main users chart-page" id="skip-target">
  <div class="container">
    <h2 class="main-title">Dashboard</h2>
    <p class="sub-main-title">Kode : A001</p>
    <div class="row stat-cards">
      <div class="col-md-6 col-xl-4">
        <article class="stat-cards-item">
          <div class="stat-cards-icon primary">
            <img src="{{asset('img/svg/temp-icon.png')}}" height="55px" width="55px" alt="" />
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">Temperature</p>
            <p class="stat-cards-info__title" style="display: inline-block" id="temperature">0</p><span style="color: #c5c2c2">&#176;C</span>
            <p class="stat-cards-info__progress">
              <span class="stat-cards-info__profit success">
                <i data-feather="trending-up" aria-hidden="true"></i>Nilai terkini
              </span>              
            </p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-4">
        <article class="stat-cards-item">
          <div class="stat-cards-icon primary">
            <img src="{{asset('img/svg/humidity-icon.png')}}" width="45px" height="45px" alt="" />
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">Humidity</p>
            <p class="stat-cards-info__title" id="humidity">0%</p>
            <p class="stat-cards-info__progress">
              <span class="stat-cards-info__profit success">
                <i data-feather="trending-up" aria-hidden="true"></i>Nilai terkini
              </span>              
            </p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-4">
        <article class="stat-cards-item">
          <div class="stat-cards-icon primary">
            <img src="{{asset('img/svg/cahaya-icon.png')}}" width="50px" height="50px" alt="" />
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num">Intensitas Cahaya</p>
            <p class="stat-cards-info__title" id="intensitasCahaya">0 lux</p>
            <p class="stat-cards-info__progress">
              <span class="stat-cards-info__profit success">
                <i data-feather="trending-up" aria-hidden="true"></i>Nilai terkini
              </span>
            </p>
          </div>
        </article>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div class="chart">
          <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
      </div>
      <div class="col-lg-3">
        <article class="white-block">
          <div class="top-cat-title">
            <h3>History</h3>
            <p>Value sensor</p>
          </div>
          <ul class="top-cat-list">
            <li>
              <a href="##">
                <div class="top-cat-list__title" style="color: aqua">Temperature</div>
                <div class="top-cat-list__subtitle">
                  <span class="timetemp1">00:00:00</span> --- <span class="temperature1">0</span>&#176;C
                </div>
                <div class="top-cat-list__subtitle">
                  <span class="timetemp2">00:00:00</span> --- <span class="temperature2">0</span>&#176;C
                </div>
                <div class="top-cat-list__subtitle">
                  <span class="timetemp3">00:00:00</span> --- <span class="temperature3">0</span>&#176;C
                </div>
              </a>
            </li>
            <li>
              <a href="##">
                <div class="top-cat-list__title" style="color: brown">Humidity</div>
                <div class="top-cat-list__subtitle">
                  <span class="timehumi1">00:00:00</span> --- <span class="humidity1">0</span>%
                </div>
                <div class="top-cat-list__subtitle">
                  <span class="timehumi2">00:00:00</span> --- <span class="humidity2">0</span>%
                </div>
                <div class="top-cat-list__subtitle">
                  <span class="timehumi3">00:00:00</span> --- <span class="humidity3">0</span>%
                </div>
              </a>
            </li>
            <li>
              <a href="##">
                <div class="top-cat-list__title" style="color: yellow">Intensitas Cahaya</div>
                <div class="top-cat-list__subtitle">
                  <span class="timeldr1">00:00:00</span> --- <span class="ldr1">0</span> lux
                </div>
                <div class="top-cat-list__subtitle">
                  <span class="timeldr2">00:00:00</span> --- <span class="ldr2">0</span> lux
                </div>
                <div class="top-cat-list__subtitle">
                  <span class="timeldr3">00:00:00</span> --- <span class="ldr3">0</span> lux
                </div>
              </a>
            </li>
          </ul>
        </article>
      </div>
    </div>
  </div>
</main>
@endsection
@push('jquery.js')
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@endpush
@push('mqtt.js')
  <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
@endpush
@push('dropdown.js')
  <script src="{{asset('js/dropdown.js')}}"></script>  
@endpush
@push('chart.js')
  <script src="{{asset('js/chart.js')}}"></script>
@endpush