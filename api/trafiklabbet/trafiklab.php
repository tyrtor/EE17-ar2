<?php
/*
* PHP version 7
* @category   hämta json-data från api
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
/* ta emot POST-data från klienten */
$lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
$lon = filter_input(INPUT_POST, "lon", FILTER_SANITIZE_STRING);

if ($lat && $lon) {
    /* api nyckel */
$api = "5a04359da47042b7837f88a5c61908c9";

/* sökradie i meter */
$radie = 1000;

/* max antal svar */
$max = 25;

/* url till api */
$url = "http://api.sl.se/api2/nearbystops.json?key=$api&originCoordLat=$lat&originCoordLong=$lon&maxresults=$max&radius=$radius";

/* hämta json */
$json = file_get_contents($url);

/* avkoda json */
$jsonData = json_decode($json);

var_dump($jsonData);
} else {
    echo"<p>Nåhot gick fel med in data</p>";
}
?>

