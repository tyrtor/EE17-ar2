<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Heltalsserie</h1>
        <?php
/* ta emot data */
$talet = $_REQUEST["talet"];

/* skriv ut resultatet */
echo "<table>";
echo "<tr><th>Talet</th><th>Talets Kvadrat</th></tr>";

for ($i=$talet; $i < 50 +1; $i++) { 
    $kvadrat = $i*$i;
    echo "<tr><td> $i</td><td>$kvadrat</td></tr>";
}
echo "</table>";

?>
    </div>
</body>
</html>