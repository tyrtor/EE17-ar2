<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer" >
        <h1>Vanliga stränfunktioner</h1>
        <?php
        $land = "Sverige";
        $delar = str_split("land");

        foreach ($delar as $bokstav) {
            echo "<p>$bokstav</p>";
        }

        $mening = "Sverige är ett land i norden.";
        $delar = explode(' ',$mening);

        foreach ($delar as $ord) {
            echo "<p>$ord</p>";
        }

        $mening = " Sveriger är ett land i norden  ";
        $trimmadMening = trim($mening);
        echo "<p>_$trimmadMening\_</p>";

        $url = "https://classroom.google.com/c/Mzc1MzQyODMwNjZa";
        $start = substr($url, 0, 4);
        echo "<p>De 4 första tecken är $start</p>";
        $del = substr($url, 18, 6);
        echo "<p>Det är $start</p>";

        if (strstr($url, "netflix")) {
            echo "<p>netflix hittades i texten</p>";
        }else {
            echo "<p>Netflix hittades inte i texten</p>";
        }

        $position = strpos($url, "google");
        echo "<p>ordet google fin på position $position</p>";

        $nyUrl = str_replace("google", "netflix", $url);
        echo "<p>$nyUrl</p>";
        ?>
    </div>
</body>
</html>