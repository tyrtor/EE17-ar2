<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($_REQUEST["fel"])) {
        $fel = $_REQUEST["fel"];
        if ($fel == "ja") {
            echo "Fel användarnamn eller lösenord. Vargod försök igen";
        }
    }

    ?>
    <form action="./skript3-2.php" method="POST">
        <legend>Logga in</legend><br>

        <label>Användarnamn</label>
        <input type="text" name="aNamn" required>
        
        <label>Lösenord</label>
        <input type="password" name="lösen" required>
        <button>Skicka</button>
    </form>
</body>
</html>