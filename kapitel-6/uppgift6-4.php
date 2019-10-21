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
    $mat = "Craafordsväg 12";
    if (preg_match("/[a-zåäö0-9 .]+/i", $mat)) {
        echo "<p>texten innhåller $mat</p>";
    }else{
        echo "<p>texten innhåller inte Det var en gång</p>";
    }
    ?>
</body>
</html>