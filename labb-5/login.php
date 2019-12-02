<?php
/*
* PHP version 7
* @category   ...
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
session_start();
if (!$_SESSION['login']) {
    $_SESSION['login'] = false;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);
    $lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);
    
    /* skriv ut resultatet */
    if ($aNamn == "Emil" && $lösen == "1234") {
        echo "<p class=\"alert alert-success\">Du är inloggad!</p>";
        $_SESSION['login'] = true;
    }
?>
    <div class="kontainer">
        <h1>Bloggen</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="./hemsida.php">Hemsida</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./skriva.php">Skriva</a>
            </li>
            <?php if (!$_SESSION['login']) { ?>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Logga in</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="./logout.php">Logga ut</a>
            </li>
            <?php }?>
        </ul>
        <?php
            $fran = filter_input(INPUT_GET, 'fran', FILTER_SANITIZE_STRING);
            if ($fran == "skriva") {
                echo"<p class=\"alert alert-info\">För att skriva måste du logga in</p>";
            }
        ?>
        <form action="#" method="POST">
            <legend>Logga in</legend><br>

            <label>Användarnamn</label>
            <input type="text" name="aNamn" required>
            
            <label>Lösenord</label>
            <input type="password" name="lösen" required>
            <button>Skicka</button>
        </form>

        <?php

/* ta emot data */
$aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);
$lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);

/* skriv ut resultatet */
if ($aNamn == "Emil" && $lösen == "1234") {
    echo "<p class=\"alert alert-success\">Du är inloggad!</p>";
    $_SESSION['login'] = true;
} else {
    echo"<p class=\"alert alert-warning\">Användarnamnet eller lösenordet är fel</p>";
    //$_SESSION['login'] = false;
}
    ?>
    </div>
</body>
</html>