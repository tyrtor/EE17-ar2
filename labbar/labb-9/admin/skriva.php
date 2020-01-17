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
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../sok.php">Sök</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin.php">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../skriva.php">Skriva</a>
            </li>
        </ul>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="rubrik">Rubrik</label>
            <input type="text" name="rubrik" id="rubrik" required>
            <label for="inlagg">Inlägg</label>
            <textarea name="inlagg" cols="30" rows="10"></textarea>

            <button>Skicka</button>
        </form>

        <?php
$rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
$inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);
if ($inlagg && $rubrik) {
    /* logga in på mysql-servern och välj databas */
    $conn = new mysqli($host, $användare, $lösenord, $databas);

    /* Gick det att ansluta? */
    if ($conn->connect_error) {
        die("kunde inte ansluta till databasen" . $conn->connect_error);
    } else {
        echo "<p>du är ansluten</p>";
    }

    /* registrera inlägget i tabellen */
    $sql = "INSERT INTO blogg (rubrik, inlagg) VALUES('$rubrik', '$inlagg')";
    $result = $conn->query($sql);

    /* gick det bra */
    if (!$result) {
        die("Det gick åt piparn");
    } else {
        echo"<p>inlägget har sparats</p>";
    }

}
?>
    </div>
</body>
</html>