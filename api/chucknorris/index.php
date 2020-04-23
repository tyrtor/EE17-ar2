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
        <h1>Ett Chuck Norris skämt</h1>
        <?php
        /* Tjänsten */
        $url = "https://api.chucknorris.io/jokes/random";
    
    
        /* göra ett anrop */
        $json = file_get_contents($url);
    
        /* avkoda json */
        $jsonData = json_decode($json);
    
        /* plocka ut skämtet */
        $skämtet = $jsonData->value;

        /* plocka ut skämtet */
        $bilden = $jsonData->icon_url;
    
        /* skriv ut skämt */
        echo"<img src=\"$bilden\" alt=\"chuck norris\">
        <h2>$skämtet</h2>";
        ?>
    </div>
</body>
</html>