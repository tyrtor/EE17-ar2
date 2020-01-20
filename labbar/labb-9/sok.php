<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
session_start();
include_once "./admin/konfig-db.php";
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
                <a class="nav-link" href="./lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./sok.php">Sök</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin/admin.php">Admin</a>
            </li>
        </ul>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <input type="text" name="soktext" id="soktext" placeholder="Sök" required>

            <button class="btn btn-primary">Sök</button>
        </form>

        <?php
/* ta emot söktexten */
$soktext = filter_input(INPUT_POST, 'soktext', FILTER_SANITIZE_STRING);
if ($soktext) {
    /* 1. */
    /* logga in på mysql-servern och välj databas */
    $conn = new mysqli($host, $användare, $lösenord, $databas);

    /* Gick det att ansluta? */
    if ($conn->connect_error) {
        die("kunde inte ansluta till databasen" . $conn->connect_error);
    } else {
        /*  echo "<p>du är ansluten</p>"; */
    }

    /* 2. */
    /* SQL??? */
    $sql = "SELECT * FROM `blogg` WHERE `Rubrik` LIKE '%$soktext%' OR `Inlagg` LIKE '%$soktext%'";
    $resultat = $conn->query($sql);

    /* hur många träffar blev det */
    echo"<h5>Hittade $resultat->num_rows inlägg som matchade ditt sökord</h5>";

    /* 3. */
    while ($rad = $resultat->fetch_assoc()) {
        echo "<div class=\"inlagg\"><b>$rad[Datum]<br> $rad[Rubrik]</b><br> $rad[Inlagg]</div>";
    }

    /* 4. */
    /* stäng ned anslutningen */
    $conn->close();
}

?>
    </div>
</body>
</html>