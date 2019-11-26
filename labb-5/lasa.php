<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bloggen</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="./hemsida.php">Hemsida</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  active" href="./lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./skriva.php">Skriva</a>
            </li>
        </ul>
        <?php
    $fil = "blogg.txt";
    if (is_readable($fil)) {
        $rader = file($fil);
        $rader = array_reverse($rader);

        foreach ($rader as $rad) {
            echo"$rad";
        }
    }
    ?>
    </div>
</body>
</html>