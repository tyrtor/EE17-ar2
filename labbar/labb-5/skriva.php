<?php
/*
* PHP version 7
* @category   ...
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
session_start();
var_dump($_SESSION['login']);
if (!isset($_SESSION['login'])) {
    header("location: login.php?fran=skriva");
}
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
                <a class="nav-link" href="./hemsida.php">Hemsida</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./lasa.php">Läsa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="./skriva.php">Skriva</a>
            </li>
            <?php if (!isset($_SESSION['login'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Logga in</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="./logout.php">Logga ut</a>
            </li>
            <?php }?>
        </ul>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

            <label for="rubrik">Titeln</label>
            <input type="text" name="rubrik" id="rubrik">

            <textarea name="inlagg" cols="30" rows="10"></textarea>

            <button>Skicka</button>
        </form>
    </div>
    <?php
    $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
    $inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);
    if ($inlagg && $rubrik) {

        $idag = date("F j, Y, G:i");
        $filnamn = "blogg.txt";
        $handtag = fopen($filnamn,'a');
        fwrite($handtag, "<div class=\"inlagg\">\n$rubrik\n$inlagg\n$idag\n</div>\n");
        fclose($handtag);
        
    }
    ?>
</body>
</html>