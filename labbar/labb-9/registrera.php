<?php
/*
* PHP version 7
* @category   registrering med hash
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
header("location: login.php?fran=register");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Registrering</h1>
        <form action="#" method="post">
            <label for="aNamn">Användarnamn</label>
            <input type="text" name="aNamn" id="aNamn" required>
    
            <label for="losen">Lösenord</label>
            <input type="password" name="losen" id="losen" required>
    
            <label for="losenIgen">Upprepa Lösenordet</label>
            <input type="password" name="losenIgen" id="losenIgen" required>
            <button>Registrera</button>
        </form>

    <?php
    $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
    $losenIgen = filter_input(INPUT_POST, 'losenIgen', FILTER_SANITIZE_STRING);

        if ($aNamn && $losen && $losenIgen) {
            if ($losen == $losenIgen) {
                $trimLosen = trim($losen);
                $trimLosenIgen = trim($losenIgen);
                $aNamnTrim = trim($aNamn);

                $aNamnSma = mb_strtolower($aNamnTrim);

                $losenTotHash = password_hash($trimLosenIgen, PASSWORD_DEFAULT);

                $fil = 'losen.txt';
                $handtag = fopen($fil, 'a') or die("Kunde inte öppna filen. Vänligen försök igen.");
                fwrite($handtag, "$aNamnSma $losenTotHash \n");
                fclose($handtag);

            } else {
                echo"<p>Lösenorden stämmer inte överens.</p>";
            }
        }
    ?>
    </div>
</body>
</html>