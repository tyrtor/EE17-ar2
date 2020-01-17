<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
session_start();
include_once "../konfig-db.php";
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
                <a class="nav-link active">Redigera</a>
            </li>
        </ul>
        <?php
/* Läs in id och hämta inläggets rubrik och text */
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
$inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);

/*1. logga in på mysql-servern och välj databas */
$conn = new mysqli($host, $användare, $lösenord, $databas);

/*1b. Gick det att ansluta? */
if ($conn->connect_error) {
    die("kunde inte ansluta till databasen" . $conn->connect_error);
} else {
    /* echo "<p>du är ansluten</p>"; */
}

/*2. SQL??? */
if ($id && !$rubrik) {
    
    $sql = "SELECT * FROM blogg WHERE ID = '$id'";
    $resultat = $conn->query($sql);

    /*3. bearbeta svaret från databasen */
    $rad = $resultat->fetch_assoc();
    echo "<form action=\"#\" method=\"POST\">";
    echo "<label for=\"rubrik\">Rubrik</label>";
    echo "<input type=\"text\" name=\"rubrik\" value=\"$rad[Rubrik]\" id=\"rubrik\">";
    echo "<input type=\"hidden\" name=\"id\" value=\"$id\" id=\"rubrik\">";
    echo "<label for=\"inlagg\">Inlägg</label>";
    echo "<textarea name=\"inlagg\" cols=\"30\" rows=\"\">$rad[Inlagg]</textarea>";
    echo "<button>Updatera</button>";
    echo "</form>";
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

if ($inlagg && $rubrik) {
    /* logga in på mysql-servern och välj databas */
    $conn = new mysqli($host, $användare, $lösenord, $databas);

    /* Gick det att ansluta? */
    if ($conn->connect_error) {
        die("kunde inte ansluta till databasen" . $conn->connect_error);
    } else {
        /* echo "<p>du är ansluten</p>"; */
    }

    /* registrera inlägget i tabellen */
    $sql = "UPDATE blogg SET Rubrik='$rubrik', Inlagg='$inlagg' WHERE ID = '$id'";
    $result = $conn->query($sql);

    /* gick det bra */
    if (!$result) {
        die("Det gick åt piparn");
    } else {
        echo "<p class=\"alert alert-success\">inlägget har sparats</p>";
    }

}
?>
    </div>
</body>
</html>