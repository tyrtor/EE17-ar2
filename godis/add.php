<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
include_once "./konfig-db.php"
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GodisBloggen</title>
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
                <a class="nav-link active" href="add.php">Lägg till</a>
            </li>
        </ul>
        <form class="kol2" action="#" method="POST">
            <label for="namn">Namn</label>
            <input name="namn" type="text">

            <label for="bild">Bild</label>
            <input name="bild" type="text">

            <label for="omdomme">Omdömme</label>
            <textarea name="omdomme" cols="30" rows="10"></textarea>

            <label for="betyg">Betyg</label>
            <select name="betyg" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <button>Skicka</button>
        </form>

        <?php
        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
        $bild = filter_input(INPUT_POST, 'bild', FILTER_SANITIZE_STRING);
        $omdomme = filter_input(INPUT_POST, 'omdomme', FILTER_SANITIZE_STRING);
        $betyg = filter_input(INPUT_POST, 'betyg', FILTER_SANITIZE_STRING);

        /* logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* Gick det att ansluta? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        }

        /* SQL??? */
        $sql = "INSERT INTO godis (omdömme, bild, namn, betyg) VALUES ('$omdomme', '$bild', '$namn', '$betyg')";
        $resultat = $conn->query($sql);

        /* gick det bra */
        if (!$resultat) {
            die("<p class=\"alert alert-danger\" role=\"alert\">Det gick åt piparn: " . $conn->error . "</p>");
        } else {
            echo "<p class=\"alert alert-success\" role=\"alert\">inlägget har sparats</p>";
        }

        /* stäng ned anslutningen */
        $conn->close();
        ?>
    </div>
</body>
</html>