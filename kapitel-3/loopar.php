<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
</head>
<body>
    <?php
    /* skrv ut tio tal 1...10 */

    echo "<p> Steg:";
    for ($i=0; $i < 10; $i++) { 
        echo " $i,";
    }
    echo "</p>";


    echo "<table>";
    echo "<tr><th>Talet</th><th>talet gånger 10</th>";

    for ($i=0; $i < 10; $i++) { 
        $i10 = $i*10;
        echo "<tr><td> $i</td><td> $i10</td></tr>";
    }
    echo "</table>";



    echo "<table>";
    echo "<tr><th>Talet</th><th>talet gånger 10</th>";

    for ($i=10; $i > 0; $i--) { 
        $i10 = $i*10;
        echo "<tr><td> $i</td><td> $i10</td></tr>";
    }
    echo "</table>";


    echo "<table>";
    echo "<tr><th>Kvadrat</th></tr>";
    $i = 10;
while ($i > 1) {
    $i2 = $i * $i;
    echo "<tr><td> $i2</td></tr>";
    $i--;
}
    echo "</table>";
    ?>
</body>
</html>