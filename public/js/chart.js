$(document).ready(function(){
    let temperature = [];
    let humidity = [];
    let ldr = [];
    let time = [];
    function addData(msg){
        // Add to database with Jquery AJAX over http REST API
        $.post("http://127.0.0.1:8000/api/data",{
            device_kode: msg.device_kode,
            temperature: msg.temperature,
            humidity: msg.humidity,
            ldr: msg.ldr
        },
        function(message){
            console.log(message);
        });

        // Membuat time sekarang dalam HH:MM:SS
        let now = new Date();

        // Cek isi array => biar di chart tidak terlalu banyak
        if( myChart.data.datasets[0].data.length === 7 ){
            myChart.data.datasets[0].data.shift();
            myChart.data.datasets[1].data.shift();
            myChart.data.datasets[2].data.shift();
            myChart.data.labels.shift();
        }

        // Add to chart
        myChart.data.datasets[0].data.push(msg.temperature);
        myChart.data.datasets[1].data.push(msg.humidity);
        myChart.data.datasets[2].data.push(msg.ldr);
        myChart.data.labels.push(now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds());
        myChart.update();
    
        // Me replace value from mqtt to html blade over jquery
        $('#temperature').text(myChart.data.datasets[0].data.findLast(element => element));
        $('#humidity').text(myChart.data.datasets[1].data.findLast(element => element));
        $('#intensitasCahaya').text(myChart.data.datasets[2].data.findLast(element => element));

        // History value sensor
        temperature.push(msg.temperature);
        humidity.push(msg.humidity);
        ldr.push(msg.ldr);
        time.push(now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds());

        console.log(temperature.length)
        if(temperature.length === 1){
            $('.temperature1').text(msg.temperature);
            $('.humidity1').text(msg.humidity);
            $('.ldr1').text(msg.ldr);
            $('.timetemp1').text(time[0]);
            $('.timehumi1').text(time[0]);
            $('.timeldr1').text(time[0]);
        }else if(temperature.length === 2){
            $('.temperature2').text(msg.temperature);
            $('.humidity2').text(msg.humidity);
            $('.ldr2').text(msg.ldr);
            $('.timetemp2').text(time[1]);
            $('.timehumi2').text(time[1]);
            $('.timeldr2').text(time[1]);
        }else if(temperature.length === 3){
            $('.temperature3').text(msg.temperature);
            $('.humidity3').text(msg.humidity);
            $('.ldr3').text(msg.ldr);
            $('.timetemp3').text(time[2]);
            $('.timehumi3').text(time[2]);
            $('.timeldr3').text(time[2]);
        }else if(temperature.length === 4){
            temperature.shift();
            ldr.shift();
            time.shift();
            
            $('.temperature1').text(temperature[0]);
            $('.humidity1').text(humidity[0]);
            $('.ldr1').text(ldr[0]);

            $('.temperature2').text(temperature[1]);
            $('.humidity2').text(humidity[1]);
            $('.ldr2').text(ldr[1]);

            $('.temperature3').text(temperature[2]);
            $('.humidity3').text(humidity[2]);
            $('.ldr3').text(ldr[2]);

            $('.timetemp1').text(time[0]);
            $('.timehumi1').text(time[0]);
            $('.timeldr1').text(time[0]);

            $('.timetemp2').text(time[1]);
            $('.timehumi2').text(time[1]);
            $('.timeldr2').text(time[1]);

            $('.timetemp3').text(time[2]);
            $('.timehumi3').text(time[2]);
            $('.timeldr3').text(time[2]);
        }
    }
    function dataManual(){
        let now = new Date();

        // Cek isi array => biar di chart tidak terlalu banyak
        if( myChart.data.datasets[0].data.length === 7 ){
            myChart.data.datasets[0].data.shift();
            myChart.data.datasets[1].data.shift();
            myChart.data.datasets[2].data.shift();
            myChart.data.labels.shift();
        }

        // Add to chart
        myChart.data.datasets[0].data.push(Math.round(Math.random() * 100));
        myChart.data.datasets[1].data.push(Math.round(Math.random() * 100));
        myChart.data.datasets[2].data.push(Math.round(Math.random() * 100));
        myChart.data.labels.push(now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds());
        myChart.update();
    
        // Me replace value from mqtt to html blade over jquery
        $('#temperature').text(myChart.data.datasets[0].data.findLast(element => element));
        $('#humidity').text(myChart.data.datasets[1].data.findLast(element => element));
        $('#intensitasCahaya').text(myChart.data.datasets[2].data.findLast(element => element));

        // History value sensor
        temperature.push(Math.round(Math.random() * 100));
        humidity.push(Math.round(Math.random() * 100));
        ldr.push(Math.round(Math.random() * 100));
        time.push(now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds());

        console.log(temperature.length)
        if(temperature.length === 1){
            $('.temperature1').text(Math.round(Math.random() * 100));
            $('.humidity1').text(Math.round(Math.random() * 100));
            $('.ldr1').text(Math.round(Math.random() * 100));
            $('.timetemp1').text(time[0]);
            $('.timehumi1').text(time[0]);
            $('.timeldr1').text(time[0]);
        }else if(temperature.length === 2){
            $('.temperature2').text(Math.round(Math.random() * 100));
            $('.humidity2').text(Math.round(Math.random() * 100));
            $('.ldr2').text(Math.round(Math.random() * 100));
            $('.timetemp2').text(time[1]);
            $('.timehumi2').text(time[1]);
            $('.timeldr2').text(time[1]);
        }else if(temperature.length === 3){
            $('.temperature3').text(Math.round(Math.random() * 100));
            $('.humidity3').text(Math.round(Math.random() * 100));
            $('.ldr3').text(Math.round(Math.random() * 100));
            $('.timetemp3').text(time[2]);
            $('.timehumi3').text(time[2]);
            $('.timeldr3').text(time[2]);
        }else if(temperature.length === 4){
            temperature.shift();
            ldr.shift();
            time.shift();
            
            $('.temperature1').text(temperature[0]);
            $('.humidity1').text(humidity[0]);
            $('.ldr1').text(ldr[0]);

            $('.temperature2').text(temperature[1]);
            $('.humidity2').text(humidity[1]);
            $('.ldr2').text(ldr[1]);

            $('.temperature3').text(temperature[2]);
            $('.humidity3').text(humidity[2]);
            $('.ldr3').text(ldr[2]);

            $('.timetemp1').text(time[0]);
            $('.timehumi1').text(time[0]);
            $('.timeldr1').text(time[0]);

            $('.timetemp2').text(time[1]);
            $('.timehumi2').text(time[1]);
            $('.timeldr2').text(time[1]);

            $('.timetemp3').text(time[2]);
            $('.timehumi3').text(time[2]);
            $('.timeldr3').text(time[2]);
        }
    }
    // myChart
    let chart = document.getElementById('myChart');
    if (chart) {
        var myCanvas = chart.getContext('2d');
        var myChart = new Chart(myCanvas, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Temperature',
                    data:[],
                    cubicInterpolationMode: 'monotone',
                    tension: 0.4,
                    backgroundColor: ['blue'],
                    borderColor: ['blue'],
                    borderWidth: 2
                },{
                    label: 'Humidity',
                    data: [],
                    cubicInterpolationMode: 'monotone',
                    tension: 0.4,
                    backgroundColor: ['brown'],
                    borderColor: ['brown'],
                    borderWidth: 2
                },{
                    label: 'Intensitas Cahaya',
                    data: [],
                    cubicInterpolationMode: 'monotone',
                    tension: 0.4,
                    backgroundColor: ['yellow'],
                    borderColor: ['yellow'],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 25,
                            color:'white'
                        },
                        grid: {
                            color:'#37374F'
                        }
                    },
                    x: {
                        grid: {
                            color: '#37374F'
                        },
                        ticks: {
                            color: 'white',
                        }
                    }
                },
                elements: {
                    point: {
                        radius: 2
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            padding:5,
                            boxWidth: 8,
                            boxHeight: 8,
                            usePointStyle: true,
                            font: {
                                size: 13,
                                weight: '300',
                            },
                            color:'white'
                        },
                        
                    },
                    title: {
                        display: true,
                        text: 'Sistem Monitoring Chickentor',
                        align: 'center',
                        color: 'white',
                        font: {
                            size: 18,
                            family: 'Inter',
                            weight: '500',
                            lineHeight: 1.4
                        }
                    }
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                }
            }
        });
    }
    window.setInterval(dataManual,3000);
    // Connecting to mqtt broker public (EMQX)
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
    const client  = mqtt.connect(url, options)
    client.on('connect', function () {
    console.log('Connected')
        client.subscribe('/temperature', function (err) {
            if (err) {
                console.log(err)
            } else {
                console.log('Subscribe in /temperature')
            }
        })
        let pub = {"value" : 0}
        pub = JSON.stringify(pub);
        client.publish('/lampu', pub, function(err){
            if (err) {
                console.log(err)
            } else {
                console.log('Published')
            }
        })
    })
    client.on('message', function (topic, message) {
        if(topic == '/temperature'){
            const msg = JSON.parse(message)
            if(typeof msg == 'object'){
                addData(msg)
            }
        }
    })
});