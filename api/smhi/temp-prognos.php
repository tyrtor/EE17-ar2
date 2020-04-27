<?php
/*
* PHP version 7
* @category   hämta json-data från api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMHI</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="./prognos.css">
</head>
<body>
    <div class="kontainer">
        <h1>SMHI</h1>
        <canvas id="myChart" width="400" height="400"></canvas>
        <?php
        /* tjänsten */
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/16/lat/58/data.json";
    
        /* göra anrop */
        $json = file_get_contents($url);
    
        /* avkoda json */
        $jsonData = json_decode($json);

        /* publiceringsdatum */
        $approvedTime = $jsonData->approvedTime;

        /* plocka tidserien */
        $timeSeries = $jsonData->timeSeries;

        /* samla in datat: tider och temp */
        $tiderData = "";
        $tempData = "";

        /* lopa igenom arrayen */
        foreach ($timeSeries as $timeData) {
            $validTime = $timeData->validTime;

            /* plocka ut parametrarna */
            $parameters = $timeData->parameters;

            /* plocka ut reperaturen */
            $parameter = $parameters[11];
            $temperatur = $parameter->values[0];

            /* plocka ut bara datum */
            $datumDelen = substr($validTime, 0, 10);

            /* skriv ut för att bara skriva ut datumet en första gång */
            $pos = strpos($tiderData, $datumDelen);

            if ($pos === false) {
                $tiderData .= "'$datumDelen', ";
            }else {
                $tiderData .= "'', ";
            }

            $tempData .= "'$temperatur', ";
        }
        
        /* chart.js kod */
        echo"<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [$tiderData],
                datasets: [{
                    label: 'SMHI Prognos Över: Stocholm',
                    data: [$tempData],
                    backgroundColor: [
                        'rgb(173, 216, 230, 0.3)'
                    ],
                    borderColor: [
                        'blue'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>";
        ?>
    </div>
</body>
</html>