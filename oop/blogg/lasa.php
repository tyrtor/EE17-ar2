<?php
/**
 * 
* PHP version 7
* @category   Blogg med lagring i databas
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
session_start();
require_once "./resurser/konfig-db.php";
require_once "./Blog.php";

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
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./lasa.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">Admin</a></li>
            </ul>
        </nav>
        <main>
            <?php
            /* skapa maskinen */
            $blog = new Blog($conn);

            /* hämta alla inlägg */
            $resultat = $blog->läsa();
            
            /* skriv ut alla inlägg */
            while ($rad = $resultat->fetch_assoc()) {
                echo "<div class=\"alert alert-secondary\">
                <h5>$rad[rubrik]</h5>
                <h5>$rad[datum]</h5>
                <p>$rad[inlagg]</p>
                </div>";
            }
            ?>
        </main>
    </div>
</body>

</html>