<?php
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>GodisBloggen!</h1>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="godis.php">Hem</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Lägg till</a>
            </li>
        </ul>

        <?php
        /* logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* Gick det att ansluta? */
        if ($conn->connect_error) {
            die("Kunde inte ansluta till databasen: " . $conn->connect_error);
        }

        /* SQL??? */
        $sql = "SELECT * FROM godis ORDER BY betyg DESC";
        $resultat = $conn->query($sql);
        echo "<table>";
        echo "<tr><th>Namn</th><th>Omdömme</th><th>Bild</th><th>Betyg</th><th>Admin</th></tr>";
        /* bearbeta svaret från databasen */
        while ($rad = $resultat->fetch_assoc()) {
            echo "<tr>
                    <td>$rad[namn]</td>
                    <td>$rad[omdömme]</td>
                    <td>$rad[bild]</td>
                    <td>$rad[betyg]</td>
                    <td>
                        <a href=\"edit.php?id=$rad[id]\"><i style=\"font-size:24px\" class=\"fa\">&#xf044;</i></a>
                        <a href=\"delet.php?id=$rad[id]\"><i style=\"font-size:24px\" class=\"fa\">&#xf014;</i></a>
                    </td>
                    </tr>";
        }
        echo "</table>";
        /* stäng ned anslutningen */
        $conn->close();
        ?>
    </div>
</body>
</html>