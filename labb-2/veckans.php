<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    echo "<h1>Veckans horoskop</h1>";

    /* sakpa en array av horosopet */
    $tecken = ["väduren", "Oxen", "Tvillingar", "kräften", "lejonet", "jungfru", "Vågen", "Skorpionen", "skytten", "Stenbocken", "Vattumanen", "Fiskarna"];

    foreach ($tecken as $index => $teknet) {
        $i = $index + 1;
    }

    /* hämta sidan */
    $sidan = fite_get_contents("https://www.tidningennara.se/astrologi/veckans-horoskop/?sign=$i");

    /* sök början på horoskopet */
    $start = strpos($sidan, "<div class=\"col-xs-7 col-sm-7\">")+ 33;
    if ($start !== false) {
    /* sök slut på horoskopet */
    $slut = strpos($sidan, "</div>" ,$start)+ 6;
        if ($slut !== false) {
            /* plocka ut horoskopet */
            $horoskop = substr($sidan, $start, $slut - $start);
        }else{

        }
    }else{

    }
    ?>
</body>
</html>