<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="tabell.css">
</head>
<body>
    <?php
    echo "<h1>SHL Tabell</h1>";

    /* hämta sidan */
    $sidan = file_get_contents("https://www.shl.se/statistik/tabell?season=2019&gameType=regular");

    /* sök början på horoskopet */
    $start = strpos($sidan, "<table class=\"rmss_t-stat-table rmss_t-scrollable-table\" data-scrollable=\"mobile\">");
    if ($start !== false) {
    /* sök slut på horoskopet */
    $slut = strpos($sidan, "</table>" ,$start)+ 8;
        if ($slut !== false) {
            /* plocka ut horoskopet */
            $shl = substr($sidan, $start, $slut - $start);
        }else{
            echo "<p>Hittade inte SHL Tabellen</p>";
        }
    }else{
        echo "<p>Hittade inte SHL Tabellen</p>";
    }
    echo "<p>$shl</p>";
    ?>
</body>
</html>