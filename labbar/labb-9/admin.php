<?php
/*
* PHP version 7
* @category   ...
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
session_start();
include_once "./konfig-db.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bloggen</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="./lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./skriva.php">Skriva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./admin.php">Admin</a>
            </li>
        </ul>
        <?php
            /* logga in på mysql-servern och välj databas */
            $conn = new mysqli($host, $användare, $lösenord, $databas);

            /* Gick det att ansluta? */
            if ($conn->connect_error) {
                die("kunde inte ansluta till databasen" . $conn->connect_error);
            } else {
                /* echo "<p>du är ansluten</p>"; */
            }

            /* SQL??? */
            $sql = "SELECT * FROM blogg";
            $resultat = $conn->query($sql);
            /* bearbeta svaret från databasen */
            echo "<table>";
            echo "<tr><th>Datum</th><th>Rubrik</th><th>Inlägg</th><th>Handling</th></tr>";
            while ($rad = $resultat->fetch_assoc()) {
                $rest = substr($rad[Inlagg], 0, 20);
                echo "<tr><td>$rad[Datum]</td><td>$rad[Rubrik]</td><td>$rest...</td><td><a href=\"\"><i style=\"font-size:24px\" class=\"fa\">&#xf044;</i></a> <a href=\"radera.php?id=$rad[ID]\"><i style=\"font-size:24px\" class=\"fa\">&#xf014;</i></a>
                </td></tr>";
            }
            /* stäng ned anslutningen */
            $conn->close();
        ?>
    </div>
</body>
</html>