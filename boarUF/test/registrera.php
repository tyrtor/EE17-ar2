<?php
/*
* PHP version 7
* @category   registrering med hash
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrering</title>
    <link rel="stylesheet" href="../css/boar.css">
</head>
<body>
<a href="index.html"><img src="../bilder/boarlogo1.jpg" class="sticky" alt="logga med ett vildsvin"></a>
        <div class="dropdown-container">
            <div class="dropdown aktiv">
                <a href="https://boaruf.se/index.html"><button class="dropbtn">Hem</button></a>
            </div>
            <div class="dropdown">
                <a href="https://boaruf.se/produkter.html"><button class="dropbtn">Produkter</button></a>
            </div>
            <div class="dropdown">
                <a href="https://boaruf.se/kontakt.html"><button class="dropbtn">Kontakt</button></a>
            </div> 
            <div class="dropdown">
                <a href="https://boaruf.se/om-oss.html"><button class="dropbtn">Om oss</button></a>
            </div> 
    <!--    start av content -->
        </div>
    <div class="kontainer">
    <h1>Registrering</h1>
        <form action="#" method="post" class="grid-container">
            <label for="namn">Förnamn</label>
            <input type="text" name="namn" id="namn" required>

            <label for="eNamn">Efternamn</label>
            <input type="text" name="eNamn" id="eNamn" required>

            <label for="emial">Emailadress</label>
            <input type="text" name="email" id="email" required>

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
    $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
    $eNamn = filter_input(INPUT_POST, 'eNamn', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
    $losenIgen = filter_input(INPUT_POST, 'losenIgen', FILTER_SANITIZE_STRING);

        if ($namn && $eNamn && $email && $aNamn && $losen && $losenIgen) {
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
    <footer class="grid-container">
            <div class="grid-item">
                    <h4><a href="kontakt.html">Kontakt</a></h4>
                <img class="nummer" src="../bilder/nummer.PNG" alt="070 - 954 11 95">
                <a href="mailto: boar.wear.uf@gmail.com">Email: boar.wear.uf@gmail.com</a>
            </div>
            <div class="grid-item">
                    <h4>Du hittar oss på</h4>
                <p>Instagram</p>
                <p>Facebook</p>
            </div>
            <div class="grid-item">
                    <h4>Boar UF</h4>
                <p>Vi är ett UF-företag som brinner för sport och framförallt innebandy... <a href="om-oss.html">läs mer</a></p>
            </div>
    </footer>
</body>
</html>