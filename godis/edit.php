<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
error_reporting(0);
ini_set('display_errors', 0);
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Godisbloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>GodisBloggen!</h1>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="godis.php">Hem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Lägg till</a>
            </li>
        </ul>
        <?php

        /* Läs in id och hämta inläggets rubrik och text */
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
        $bild = filter_input(INPUT_POST, 'bild', FILTER_SANITIZE_STRING);
        $omdomme = filter_input(INPUT_POST, 'omdomme', FILTER_SANITIZE_STRING);

        /*1. logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /*1b. Gick det att ansluta? */
        if ($conn->connect_error) {
            die("kunde inte ansluta till databasen" . $conn->connect_error);
        } else {
            /* echo "<p>du är ansluten</p>"; */
        }

        /*2. SQL??? */
        if ($id && !$namn) {

            $sql = "SELECT * FROM godis WHERE id = '$id'";
            $resultat = $conn->query($sql);

            /*3. bearbeta svaret från databasen */
            $rad = $resultat->fetch_assoc();
            echo "<form class=\"kol2\" action=\"#\" method=\"POST\">
            <label for=\"namn\">Namn</label>
            <input name=\"namn\" type=\"text\" value=\"$rad[namn]\">

            <label for=\"bild\">Bild</label>
            <input name=\"bild\" type=\"text\" value=\"$rad[bild]\">

            <label for=\"omdomme\">Omdömme</label>
            <textarea name=\"omdomme\" cols=\"30\" rows=\"10\">$rad[omdömme]</textarea>

            <label for=\"betyg\">Betyg</label>
            <select name=\"betyg\" id=\"\">
                <option value=\"1\">1</option>
                <option value=\"2\">2</option>
                <option value=\"3\">3</option>
                <option value=\"4\">4</option>
                <option value=\"5\">5</option>
                <option value=\"6\">6</option>
                <option value=\"7\">7</option>
                <option value=\"8\">8</option>
                <option value=\"9\">9</option>
                <option value=\"10\">10</option>
            </select>
            <button>Uppdatera</button>
        </form>";
        }

        if ($namn && $bild && $omdomme) {

            /* registrera inlägget i tabellen */
            $sql = "UPDATE godis SET namn='$namn', bild='$bild', omdömme='$omdomme' WHERE id = '$id'";
            $result = $conn->query($sql);

            /* gick det bra */
            if (!$result) {
                die("Det gick åt piparn");
            } else {
                echo "<p class=\"alert alert-success\">inlägget har sparats</p>";
            }
        }

        $conn->close();

        ?>
    </div>
</body>
</html>