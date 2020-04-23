<?php
/*
* PHP version 7
* @category   hämta data i JSON-format
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        echo"<h1>Vädret I $stad</h1>";
        /* api nyckel */
        $api = "22ee1d58f7adae08ee71fa7c0bd24481";

        /* stad */
        $stad = "Luleå";

        /* Tjänsten */
        $url = "http://api.openweathermap.org/data/2.5/weather?q=$stad&appid=$api&units=metric";
    
    
        /* göra ett anrop */
        $json = file_get_contents($url);
    
        /* avkoda json */
        $jsonData = json_decode($json);

        /* plocka ut kordinater */
        $kordinater = $jsonData->coord;
        $lon = $kordinater->lon;
        $lat = $kordinater->lat;

        /* plocka ut vädret */
        $väder = $jsonData->weather;
        $himlen = $väder[0]->description;
        $ikon = $väder[0]->icon;

        /* plocka ut temperaturen */
        $temp = $jsonData->main;
        $grader = $temp->temp;

        /* plocka ut vind */
        $vind = $jsonData->wind;
        $hastighet = $vind->speed;

        /* skriv ut allt */
        echo"<p><b>Latitud:</b> $lat&deg; <br> <b>Longitud:</b> $lon&deg;</p>";
        echo"<p><b>Himlen:</b> $himlen</p>";
        echo"<img src=\"http://openweathermap.org/img/wn/$ikon@2x.png\" alt=\"bild på himlen\">";
        echo"<p><b>Temperaturen är:</b> $grader&deg;C</p>";
        echo"<p><b>Vindhastigheten är:</b> $hastighet m/s</p>";
    
        ?>
    </div>
</body>
</html>