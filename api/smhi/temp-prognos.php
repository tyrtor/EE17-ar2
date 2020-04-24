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
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>SMHI</h1>
        <?php
        /* tjänsten */
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/16/lat/58/data.json";
    
        /* göra anrop */
        $json = file_get_contents($url);
    
        /* avkoda json */
        $jsonData = json_decode($json);

        /* publiceringsdatum */
        $approvedTime = $jsonData->approvedTime;
        echo"<p>$approvedTime</p>";

        /* plocka tidserien */
        $timeSeries = $jsonData->timeSeries;

        /* lopa igenom arrayen */
        foreach ($timeSeries as $timeData) {
            $validTime = $timeData->validTime;

            /* plocka ut parametrarna */
            $parameters = $timeData->parameters;

            /* plocka ut reperaturen */
            $parameter = $parameters[11];
            $temperatur = $parameter->values[0];
            echo"<p><br>Tid:$validTime <br>Temperatur: $temperatur&deg;C</p>";
        }
        
    
        ?>
    </div>
</body>
</html>