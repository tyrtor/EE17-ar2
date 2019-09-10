<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="uppgift2-1.css">
</head>
<?php
        /* ta emot färgen */
        $bgfärg = $_REQUEST["bgFärg"];


        /* måla bakgrunden */
        echo "<body style=\"background: $bgfärg\">";
        ?>

    <div class="kontainer">
        <h1>Är allt rätt?</h1>

    </div>
</body>
</html>