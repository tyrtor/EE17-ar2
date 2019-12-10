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
/* filnamn */
    $filnamn = "test.txt";

    /* öppna filen */
    $handtag = fopen($filnamn, 'write');

    /* skriva i filen */
    fwrite($handtag, "hej på dig!");
    echo "<p>En rad har skrivits i filen</p>";

    /* stänga filen */
    fclose($handtag);

    /* öppna filen för att läsa */
    $handtag = fopen($filnamn, 'r');

    /* skriva i filen */
    $texten = fread($handtag, 12);
    echo "<p>$texten</p>";

    /* stänga filen */
    fclose($handtag);

    
    /* enklare sätt att läsa in en fil */
    /* 1. file_get_content */

    $filnamn = "sang.txt";
    $texten = file_get_contents($filnamn);
    echo "<p>$texten</p>";

    /* 2. file() */
    $rader = file($filnamn);
    foreach ($rader as $rad) {
        echo "<p>$rad</p>";
    }

    ?>
</body>
</html>