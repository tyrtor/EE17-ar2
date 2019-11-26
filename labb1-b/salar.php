<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
        $filnamn = "salar.tsv";
        echo"<table>";
        $rader = file($filnamn);
        foreach ($rader as $rad) {

            $delar = explode("\t", $rad);
            $salNr = $delar[1];
            $salNamn = $delar[2];
            $bokbar = $delar[3];
            
            if (strstr($salNr, '/')) {
                $delar = explode('/', $salNr);
                $salNr = $delar[0];
                $salNamn = $delar[1];
            }


            $salNrNamn = strstr($rad, '/', true);

            echo"<tr><td>$salNr</td><td>$salNamn</td><td>$bokbar</td></tr>";
            
        }
        echo"</table>";
        ?>
    </div>
</body>
</html>