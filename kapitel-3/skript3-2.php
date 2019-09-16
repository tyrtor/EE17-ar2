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
        <h1>GRATTIS!</h1>
        <?php
/* ta emot data */
$aNamn = $_REQUEST["aNamn"];
$lösen = $_REQUEST["lösen"];

/* skriv ut resultatet */
if ($aNamn == "Emil" && $lösen == "1234") {
    echo "<p>Du är inloggad!</p>";
} else {
    header("location: uppgift3-2.html?fel=ja");
}

?>
    </div>
</body>
</html>