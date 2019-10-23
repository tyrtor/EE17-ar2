<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="boar.css">
</head>
<body>
    <form action="./loggedIn.php" method="post">
        <input type="text" name="aNamn" required placeholder="Användarnamn">
        <input type="password" name="losen" required placeholder="Lösenord">
        <button>Logga in</button>
    </form>
    <?php
    $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);

    if ($aNamn && $losen) {
        if (strlen($losen < 8)) {
            echo "<p>Ditt lösenord måste vara längre än 8 täcken.</p>";
        }
        
    }
?>
</body>
</html>