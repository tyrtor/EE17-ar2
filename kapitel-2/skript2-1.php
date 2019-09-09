<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="uppgift2-1.css">
</head>
<body>
    <div class="kontainer">
        <h1>Multiplicera</h1>
        <?php
/* ta emot data */
$tal1 = $_REQUEST["tal1"];
$tal2 = $_REQUEST["tal2"];

/* skriv ut resultatet */
$resultat = $tal1 * $tal2;
echo "<p>Produkten av $tal1 och $tal2 är $resultat</p>";
?>
    </div>
</body>
</html>