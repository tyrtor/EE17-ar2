<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <legend>Räkna ut ålder</legend><br>

        <label>Perssonnummer</label>
        <input type="text" name="persNr">
            <button>Skicka</button> 
    </form>    
    <?php
    $persNr = filter_input(INPUT_POST, 'persNr', FILTER_SANITIZE_STRING);
    if ($persNr) {
        /* datumobjekt när man föddes */
        $då = new DateTime($persNr);

        /* datumobjekt för idag */
        $nu = new DateTime();

        /* differansen mellan dessa två datum */
        $differans = $nu->diff($då);

        /* plocka ut åldern i läsbart format */
        $antalÅ = $differans->y;
        $antalM = $differans->m;
        $antalD = $differans->d;

        echo "<p>Ditt personnummer är $persNr</p>";
        echo "<p>Du är $antalÅ år, $antalM månader och $antalD dagar gammal</p>";
    }
    ?>
</body>
</html>