<?php
/*
* PHP version 7
* @category   login med hash
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
            <div class="dropdown">
                <a href="../test/registrera.php"><button class="dropbtn">Registrera</button></a>
            </div>
    <!--    start av content -->
        </div>
    <div class="kontainer">
        <form action="#" method="post" class="grid-container">
            <h1>Logga in</h1><br>
            <label for="aNamn">Användarnamn</label>
            <input type="text" name="aNamn" id="aNamn" required>

            <label for="losen">Lösenord</label>
            <input type="password" name="losen" id="losen" required>

            <button>Logga in</button>
        </form>
        <?php
            $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
            $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);

            $fran = filter_input(INPUT_GET, 'fran', FILTER_SANITIZE_STRING);
            if ($aNamn && $losen) {
                $fil = "losen.txt";
                $rader = file($fil) or die("filen går ej att öppna!");

                foreach ($rader as $rad) {
                    $delar = explode(' ', $rad);
                    $anvNam = $delar[0];
                    $hash = $delar[1];
                    if ($anvNam == $aNamn) {
                        if (password_verify($losen, $hash)) {
                            echo"<p>Du är inloggad</p>";
                            exit();
                        }else{
                            echo"<p>Lösenordet stämmer inte </p>";
                            exit();
                        }

                    }
                }
                echo"<p>Användarnamnet eller Lösenordet hittas inte </p>";
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