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
        <h1>Är allt rätt?</h1>
        <?php
/* ta emot data */
$fornamn = $_REQUEST["förnamn"];
$efternamn = $_REQUEST["efternamn"];
$epost = $_REQUEST["epost"];
$kontaktad = $_REQUEST["Kontaktad"];

/* skriv ut resultatet */
echo "<p>Namn: $fornamn $efternamn</p>";
echo "<p>E-post: $epost</p>";
echo "<p>Vi kommer att kontakta dig inom snarast per $kontaktad.</p>";

?>
    </div>
</body>
</html>