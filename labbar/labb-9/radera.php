<?php
/*
* PHP version 7
* @category   ...
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
?>
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
                <a class="nav-link  active" href="./lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./skriva.php">Skriva</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin.php">Admin</a>
            </li>
        </ul>
        <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if ($id) {
            echo"<h2>Inlägg nummer $id</h2>";
        }
        ?>
    </div>
</body>
</html>