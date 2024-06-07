$(document).ready(function(){
    // let datasDht;
    // let datasLdr;
    // let temperature=[];
    // let humidity=[];
    // let intensitasCahaya=[];
    let timeNow = [];
    
    // Fetching data over http api
    // async function addData(){
    //     // fetch data dht
    //     temperature = [];
    //     humidity = [];
    //     intensitasCahaya = [];
    //     timeNow = [];
    //     await $.get("http://127.0.0.1:8000/api/dht", function(data, status){
    //         datasDht = data.data;
    //         datasDht.forEach((data,index) => {
    //             if( index > 6 ){
    //                 temperature.shift();
    //                 humidity.shift();
    //                 timeNow.shift();
    //             }
    //             temperature.push(data.temperature);
    //             humidity.push(data.humidity);
    //             let now = new Date(data.created_at);
    //             timeNow.push(now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds());
    //         });
    //     });
    //     // fetch data ldr
    //     await $.get("http://127.0.0.1:8000/api/ldr", function(data, status){
    //         datasLdr = data.data;
    //         datasLdr.forEach((data,index) => {
    //             if( index > 6 ){
    //                 intensitasCahaya.shift();
    //             }
    //             intensitasCahaya.push(data.ldr);
                
    //         });
    //     });
    //     // Set value in myChart
    //     myChart.data.datasets[0].data = temperature;
    //     $('#temperature').text(temperature[6]);
    //     myChart.data.datasets[1].data = humidity;
    //     $('#humidity').text(humidity[6]);
    //     myChart.data.datasets[2].data = intensitasCahaya;
    //     $('#intensitasCahaya').text(intensitasCahaya[6]);
    //     myChart.data.labels = timeNow;
    //     myChart.update();
    // }
    
    // Fetching data over MQTT
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
        timeNow.push(now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds());

        // Cek isi array => biar di chart tidak terlalu banyak
        if( myChart.data.datasets[0].data.length === 7 ){
            myChart.data.datasets[0].data.shift();
            myChart.data.datasets[1].data.shift();
            myChart.data.datasets[2].data.shift();
            timeNow.shift();
        }

        // Add to chart
        myChart.data.datasets[0].data.push(msg.temperature);
        myChart.data.datasets[1].data.push(msg.humidity);
        myChart.data.datasets[2].data.push(msg.ldr);
        myChart.data.labels = timeNow;
        myChart.update();
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
    // window.setInterval(addData,5000);

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