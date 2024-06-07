<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Chickentor | Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('img/svg/logo.svg')}}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Selamat Datang Kembali!</h1>
      <p class="sign-up__subtitle">Masuk ke akun kamu, untuk lanjut.</p>
      <form class="sign-up-form form" action="{{url('/login')}}" method="post">
        @csrf
        @session('error_auth')
          <p style="color: red">{{session('error_auth')}}</p> 
        @endsession
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" value="{{session('email')}}" type="email" placeholder="Masukan email" required name="email">
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
        <a class="link-info forget-link" href="##">Lupa password?</a>
        <label class="form-checkbox-wrapper">
          <input class="form-checkbox" type="checkbox">
          <span class="form-checkbox-label">Ingat saya lain waktu?</span>
        </label>
        <button type="submit" class="form-btn primary-default-btn transparent-btn">Masuk</button>
        <label for="" style="display: flex; width: 100%; margin-top: 10px">
          <p class="form-label" style="margin-right: 10px">Belum memiliki akun?</p>
          <a class="link-info forget-link" href="/register">Register now!</a>
        </label>
      </form>
    </article>
  </main>

<!-- Chart library -->
<script src="{{asset('plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>