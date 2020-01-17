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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bloggen</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link  active" href="./lasa.php">Läsa</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./sok.php">Sök</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin/admin.php">Admin</a>
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
            $sql = "SELECT * FROM blogg ORDER BY `ID` DESC";
            $resultat = $conn->query($sql);
            /* bearbeta svaret från databasen */
            while ($rad = $resultat->fetch_assoc()) {
                echo"<div class=\"inlagg\"><b>$rad[Datum]<br> $rad[Rubrik]</b><br> $rad[Inlagg]</div>";
            }
            /* stäng ned anslutningen */
            $conn->close();
        ?>
    </div>
</body>
</html>