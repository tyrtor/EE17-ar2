<?php
/**
* PHP version 7
* @category   OOP
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* skapa en databas anslutning */
include_once("./resurser/konfig-db.php");
include_once("./Login.php");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggning</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-T5jhQKMh96HMkXwqVMSjF3CmLcL1nT9//tCqu9By5XSdj7CwR0r+F3LTzUdfkkQf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Inlogging</h1>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="loggain-oop.php">Logga in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="registrera-oop.php">Registrera</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            /* ta emot data */
             $aNamn = filter_input(INPUT_POST, 'anamn', FILTER_SANITIZE_STRING);
             $lösen = filter_input(INPUT_POST, 'lösen', FILTER_SANITIZE_STRING);
             $losenIgen = filter_input(INPUT_POST, 'losenIgen', FILTER_SANITIZE_STRING);
         
                if ($aNamn && $lösen) {
                    /* starta maskinen */
                    $login = new Login($conn);

                    /* registrera användare */
                    $svar = $login->registrera($aNamn, $lösen);

                    switch ($svar) {
                        case '1':
                            echo "<p class=\"alert alert-success\">Användaren är registrerad</p>";
                            break;
                        
                    }
                }
            ?>
            <form class="jumbotron" action="#" method="post">
                <label>Användarnamn</label>
                <input class="form-control" type="text" name="anamn" required>
                <label>Lösenord</label>
                <input class="form-control" type="password" name="lösen" required>
                <button class="btn btn-primary">Registrera</button>
            </form>
        </main>
    </div>
</body>
</html>