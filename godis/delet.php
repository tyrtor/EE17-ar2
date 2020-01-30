<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "./konfig-db.php";
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
                <a class="nav-link" href="add.php">Lägg till</a>
            </li>
        </ul>
        <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $radera = filter_input(INPUT_POST, 'radera', FILTER_SANITIZE_STRING);

        /* logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* Gick det att ansluta? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        }

        if ($id && !$radera) {
            echo "<h2>Godisbit nummer: $id</h2>";

            /* SQL??? */
            $sql = "SELECT * FROM godis WHERE id = '$id'";
            $resultat = $conn->query($sql);

            /* bearbeta svaret från databasen */
            $rad = $resultat->fetch_assoc();
            echo "<form action=\"#\" method=\"POST\">";
            echo "<div class=\"inlagg\"><b>$rad[datum]<br> $rad[namn]</b><br> $rad[omdömme]</div>";
            echo "<button name=\"radera\" value=\"1\"  class=\"btn btn-danger\">Radera inlägget</button>";
            echo "</form>";
        }
        /* SQL??? */
        if ($id && $radera) {
            $sql = "DELETE FROM godis WHERE id = '$id'";
            $resultat = $conn->query($sql);
            if (!$resultat) {
                die("Något har gott fel");
            } else {
                echo "<p class=\"alert alert-info\">Inlägg $id har raderats</p>";
            }
        }
        ?>

    </div>
</body>
</html>