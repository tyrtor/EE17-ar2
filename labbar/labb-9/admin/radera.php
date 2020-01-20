<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bloggen</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./skriva.php">Skriva</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../sok.php">Sök</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin.php">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Radera</a>
            </li>
        </ul>
        <?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$radera = filter_input(INPUT_POST, 'radera', FILTER_SANITIZE_STRING);

/* logga in på mysql-servern och välj databas */
$conn = new mysqli($host, $användare, $lösenord, $databas);

/* Gick det att ansluta? */
if ($conn->connect_error) {
    die("kunde inte ansluta till databasen" . $conn->connect_error);
} else {
    /* echo "<p>du är ansluten</p>"; */
}

if ($id && !$radera) {
    echo "<h2>Inlägg nummer $id</h2>";

    /* SQL??? */
    $sql = "SELECT * FROM blogg WHERE ID = '$id'";
    $resultat = $conn->query($sql);

    /* bearbeta svaret från databasen */
    $rad = $resultat->fetch_assoc();
    echo "<form action=\"#\" method=\"POST\">";
    echo "<div class=\"inlagg\"><b>$rad[Datum]<br> $rad[Rubrik]</b><br> $rad[Inlagg]</div>";
    echo "<button name=\"radera\" value=\"1\"  class=\"btn btn-danger\">Radera inlägget</button>";
    echo "</form>";
}

/* när man klickat på knappen */
if ($id && $radera) {
    $sql = "DELETE FROM blogg WHERE ID = '$id'";
    $resultat = $conn->query($sql);
var_dump($sql, $resultat);
    if (!$resultat) {
        die("Något har gott fel");
    } else {
        echo "<p class=\"alert alert-info\">Inlägg $id har raderats</p>";
    }
}

/* stäng ned anslutningen */
$conn->close();
?>
    </div>
</body>
</html>