<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Sign In</title>
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
      <form class="sign-up-form form" action="/login" method="post">
        @csrf
        @if ($errors->any())
          <p style="color: red" >{{$errors->all()[0]}}</p>
        @endif
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" value="{{Session::get('email')}}" type="email" placeholder="Masukan email" required name="email">
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input class="form-input" type="password" placeholder="Masukan password" required name="password">
        </label>
        <a class="link-info forget-link" href="##">Lupa password?</a>
        <label class="form-checkbox-wrapper">
          <input class="form-checkbox" type="checkbox">
          <span class="form-checkbox-label">Ingat saya lain waktu?</span>
        </label>
        <button class="form-btn primary-default-btn transparent-btn">Masuk</button>
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