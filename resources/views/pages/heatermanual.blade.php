@extends('layouts.main')
@section('content')
  <div class="container">
    <h2 style="color: white; margin-top: 20px; margin-bottom: 25px;">Control Heater</h2>          
    <form class="sign-up-form form" action="/login" method="post">
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
        <div class="pembungkus">
          <p class="form-label">Switch button</p>
          <div class="toogle">
            <div class="toogle-button" onclick="animatedToogle()"></div>
          </div>
          <div class="status">OFF</div>
          <input type="text" name="status" hidden>
        </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
  <script>
    const url = 'wss://x10ea311.ala.asia-southeast1.emqxsl.com:8084/mqtt'
    const options = {
      clean: true,
      connectTimeout: 4000,
      clientId: 'emqx-novatayudi',
      username: 'Novatayudi',
      password: 'Xos116ya77',
      ca:`-----BEGIN CERTIFICATE-----
        MIIDrzCCApegAwIBAgIQCDvgVpBCRrGhdWrJWZHHSjANBgkqhkiG9w0BAQUFADBh
        MQswCQYDVQQGEwJVUzEVMBMGA1UEChMMRGlnaUNlcnQgSW5jMRkwFwYDVQQLExB3
        d3cuZGlnaWNlcnQuY29tMSAwHgYDVQQDExdEaWdpQ2VydCBHbG9iYWwgUm9vdCBD
        QTAeFw0wNjExMTAwMDAwMDBaFw0zMTExMTAwMDAwMDBaMGExCzAJBgNVBAYTAlVT
        MRUwEwYDVQQKEwxEaWdpQ2VydCBJbmMxGTAXBgNVBAsTEHd3dy5kaWdpY2VydC5j
        b20xIDAeBgNVBAMTF0RpZ2lDZXJ0IEdsb2JhbCBSb290IENBMIIBIjANBgkqhkiG
        9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4jvhEXLeqKTTo1eqUKKPC3eQyaKl7hLOllsB
        CSDMAZOnTjC3U/dDxGkAV53ijSLdhwZAAIEJzs4bg7/fzTtxRuLWZscFs3YnFo97
        nh6Vfe63SKMI2tavegw5BmV/Sl0fvBf4q77uKNd0f3p4mVmFaG5cIzJLv07A6Fpt
        43C/dxC//AH2hdmoRBBYMql1GNXRor5H4idq9Joz+EkIYIvUX7Q6hL+hqkpMfT7P
        T19sdl6gSzeRntwi5m3OFBqOasv+zbMUZBfHWymeMr/y7vrTC0LUq7dBMtoM1O/4
        gdW7jVg/tRvoSSiicNoxBN33shbyTApOB6jtSj1etX+jkMOvJwIDAQABo2MwYTAO
        BgNVHQ8BAf8EBAMCAYYwDwYDVR0TAQH/BAUwAwEB/zAdBgNVHQ4EFgQUA95QNVbR
        TLtm8KPiGxvDl7I90VUwHwYDVR0jBBgwFoAUA95QNVbRTLtm8KPiGxvDl7I90VUw
        DQYJKoZIhvcNAQEFBQADggEBAMucN6pIExIK+t1EnE9SsPTfrgT1eXkIoyQY/Esr
        hMAtudXH/vTBH1jLuG2cenTnmCmrEbXjcKChzUyImZOMkXDiqw8cvpOp/2PV5Adg
        06O/nVsJ8dWO41P0jmP6P6fbtGbfYmbW0W5BjfIttep3Sp+dWOIrWcBAI+0tKIJF
        PnlUkiaY4IBIqDfv8NZ5YBberOgOzW6sRBc4L0na4UU+Krk2U886UAb3LujEV0ls
        YSEY1QSteDwsOoBrp+uvFRTp2InBuThs4pFsiv9kuXclVzDAGySj4dzp30d8tbQk
        CAUw7C29C79Fv1C5qfPrmAESrciIxpg0X40KPMbp1ZWVbd4=
        -----END CERTIFICATE-----`
    }
    let dropdown = document.querySelector(".dropdown-device");
    let deviceKode = document.querySelector(".text03")
    dropdown.onclick = function () {
      dropdown.classList.toggle("active");
    };
    function show(a) {
      deviceKode.value = a;
    }

    let toogle = document.querySelector('.toogle');
    let status = document.querySelector('.status')
    function animatedToogle(){
      toogle.classList.toggle('active');
      const client  = mqtt.connect(url, options)
      // client.on('connect', function () {
      //   console.log('Connected')
      // })
      if(toogle.classList.contains('active')){
        status.innerHTML = "ON";
        // Post to database table config lamp over http rest api
        $.post("http://127.0.0.1:8000/api/heater/manual",{
            device_kode : deviceKode.value,
            status : "ON"
        },
        function(message){
            console.log(message);
        });
        // Post to mikrokontroler over mqtt
        let pub = {"value" : 1, "device_kode" : deviceKode.value, "name" : "heater"}
        pub = JSON.stringify(pub);
        client.publish('/lampu', pub, function(err){
          if (err) {
              console.log(err)
          } else {
              console.log(pub)
          }
        })
      }else{
        status.innerHTML = "OFF";
        // Post to database table config lamp over http rest api
        $.post("http://127.0.0.1:8000/api/heater/manual",{
            device_kode : deviceKode.value,
            status : "OFF"
        },
        function(message){
            console.log(message);
        });
        // Post to mikrokontroler over mqtt
        let pub = {"value" : 0, "device_kode" : deviceKode.value, "name" : "heater"}
        pub = JSON.stringify(pub);
        client.publish('/lampu', pub, function(err){
          if (err) {
              console.log(err)
          } else {
              console.log(pub)
          }
        })
      }
    }
  </script>
@endsection