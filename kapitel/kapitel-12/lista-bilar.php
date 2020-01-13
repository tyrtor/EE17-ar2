<?php
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lista alla bilar i tabellen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>alla bilar</h1>
        <?php
        /* logga in på mysql-servern och välj databas */
        $conn = new mysqli($host, $användare, $lösenord, $databas);

        /* Gick det att ansluta? */
        if ($conn->connect_error) {
            die("kunde inte ansluta till databasen". $conn->connect_error);
        } else {
            echo"<p>du är ansluten</p>";
        }
        
        /* ställ en sql fråga */
        $sql = "SELECT * FROM bilar";
        $result = $conn->query($sql);

        /* gick det bra */
        if (!$result) {
            die("Det gick åt piparn");
        } else {
            echo"<p>lista på bilarna kunde hämtas</p>";
        }
        
        echo "<table>";
        echo "<tr><th>Märke</th><th>Modell</th><th>Årsmodell</th></tr>";
        /* ta emot svaret och bearbeta det */
        while ($rad = $result->fetch_assoc()) {
            echo "<tr><td>{$rad[marke]}</td><td>$rad[modell]</td><td>$rad[arsmodell]</td></tr>";
        }
        echo"</table>";
        
        /* avsluta */
        $conn->close();
        ?>
    </div>
</body>
</html>