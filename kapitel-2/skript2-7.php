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
        <h1>svar</h1>
        <?php
/* ta emot data */
$storlek = $_REQUEST["storlek"];
$texten = $_REQUEST ["texten"];

if ($storlek == "V") {
    $Versaler = mb_strtoupper($texten);
    echo "<p>$Versaler</p>";
} else {
    $gemenner = mb_strtolower($texten);
    echo "<p>$gemenner</p>";
}


?>
    </div>
</body>
</html>