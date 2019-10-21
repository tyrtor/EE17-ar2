<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $mat = "toomat och gurka";
    if (preg_match("/to/", $mat)) {
        echo "<p>texten innhåller to</p>";
    }else{
        echo "<p>texten innhåller inte to</p>";
    }

    if (preg_match("/to{1,2}/", $mat)) {
        echo "<p>texten innhåller too</p>";
    }else{
        echo "<p>texten innhåller inte to</p>";
    }
    ?>
</body>
</html>