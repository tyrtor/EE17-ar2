<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="boar.css">
</head>
<body>
    <a href="../boar/boar.html"><img src="../bilder/boarlogo1.jpg" class="sticky" alt="logga med ett vildsvin"></a>
    <div class="dropdown-container">
        <div class="dropdown aktiv">
            <a href="../boar/boar.html"><button class="dropbtn">Hem</ button></a>
        </div>
        <div class="dropdown">
            <a href="../boar/produkter.php"><button class="dropbtn">Produkter</button></a>
        </div>
        <div class="dropdown">
            <a href="../boar/kontakt.html"><button class="dropbtn">Kontakt</button></a>
        </div>
        <div class="dropdown">
            <a href="../boar/om-oss.html"><button class="dropbtn">Om oss</button></a>
        </div>
        <!--    start av content -->
    </div>
    <div class="kontainer">
        <form action="./loggedIn.php" method="post">
            <table>

                <tr>
                    <td><label for="namn">För- och Efternamn</label></td>
                    <td><input type="text" name="namn" id="" required placeholder="Förnamn"></td>
                    <td><input type="text" name="namn" id="" required placeholder="Efternamn"></td>
                </tr>
                <tr>
                    <td><label for="email">Emailadress</label></td>
                    <td><input type="email" name="email" required placeholder="exempel@exempel.com"></td>
                </tr>
                <tr>
                    <td><label for="aNamn">Användarnamn</label></td>
                    <td><input type="text" name="aNamn" required placeholder="Användarnamn"></td>
                </tr>
                <tr>
                    <td>
                        <label for="losen">Lösenord</label>
                    </td>
                    <td>
                        <input type="password" name="losen" required placeholder="Lösenord">
                    </td>
                </tr>
                <tr>
                    <td><label for="uLosen">Upprepa ditt Lösenord</label></td>
                    <td><input type="password" name="uLosen" required placeholder="Lösenord"></td>
                </tr>
                <tr>
                    <td><button>Registrera</button></td>
                </tr>
            </table>
                <hr>
            <p>Har du redan ett konto? <a href="./login.php"> Logga in</a></p>
        </form>
    </div>
    <?php
    $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
    $uLosen = filter_input(INPUT_POST, 'uLosen', FILTER_SANITIZE_STRING);

    if ($aNamn && $losen && $namn && $email && $uLosen) {
        if (strlen($losen < 8)) {
            echo "<p>Ditt lösenord måste vara längre än 8 täcken.</p>";

            if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $losen)) {
                echo "<p>lösenordet uppfyller inte kraven</p>";

                if (!$uLosen == $losen) {
                    echo "<p>Ditt lösenord måste vara likadant!</p>";
                }
            }
        }
        
    }
?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="grid-container">
        <div class="grid-item">
            <h4><a href="../boar/kontakt.html">Kontakt</a></h4>
            <img class="nummer" src="../bilder/nummer.PNG" alt="070 - 954 11 95">
            <a href="mailto: boar.wear.uf@gmail.com">Email: boar.wear.uf@gmail.com</a>
        </div>
        <div class="grid-item">
            <h4>Du hittar oss på</h4>
            <p><a href="https://www.instagram.com/boaruf/?hl=sv">Instagram</a></p>
            <p>Facebook</p>
        </div>
        <div class="grid-item">
            <h4>Boar UF</h4>
            <p>Vi är ett UF-företag som brinner för sport och framförallt innebandy... <a href="../boar/om-oss.html">läs mer</a></p>
        </div>
    </footer>
</body>
</html>