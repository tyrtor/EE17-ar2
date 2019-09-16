<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>If-satser</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    $idag = date("l");

    if ($idag == "Monday") {
        echo "<p>Laugh on Monday, laugh for danger.</p>";
    } elseif ($idag == "Tuesday") {
        echo "<p>Laugh on Tesday, kiss a stranger.</p>";
    } elseif ($idag == "Wednesday") {
        echo "<p>Laugh on Wednesday, laugh for a letter.</p>";
    } elseif ($idag == "Thursday") {
        echo "<p>Laugh on Thursday, something better.</p>";
    } elseif ($idag == "Friday") {
        echo "<p>Laugh on Friday, laugh for sorrow.</p>";
    } elseif ($idag == "Saturday") {
        echo "<p>Laugh on Saturday, joy tomorrow.</p>";
    }

    $månad = date("F");
    $dagensDatum = date("d");

    if ($idag == "Friday" && $dagensDatum == "13") {
        echo "<p>STANNA HEMMA!</p>";
    } else {
        echo "<p>Kusten är klar!</p>";
    }

    if ($månad == "October" && $dagensDatum == "31") {
        echo "<p>Wooop Wooop, Idag är det Helloween</p>";
    } elseif ($månad = "October" && $dagensDatum = "30") {
        echo "<p>Tyvärr du får vänta en stund till</p>";
    }

    if ($idag == "Saturday" || $idag == "Sunday") {
        echo "<p>Skönt! idag är det helg.</p>";
    } else {
        $antalDagar = 5 - date("N");
        echo "<p>Du får vänta $antalDagar dagar till nästa helg.</p>";
    }


    
    
    ?>
</body>
</html>