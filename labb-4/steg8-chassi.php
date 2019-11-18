<?php
/*
* PHP version 7
* @category   ...
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
include_once "./funktioner.inc.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop - steg 8 - Chassi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>bygg din egna PC - Steg 8</h1>

        <h2>Välj Chassi</h2>
        <form action="varukorg.php" method="post">
            <?php
            /* lista alla produkter */
            $katalog = "./shop-bilder/chassi";
            $resultat = scandir($katalog);

            foreach ($resultat as $objekt) {
                $info = pathinfo("./$objekt");

                if ($info['extension'] == 'jpg' || $info['extension'] == 'png' || $info['extension'] == 'webp') {
                    echo"<label>";
                    echo"<input type=\"radio\" name=\"vara\" value=\"$objekt\" required>";
                    $vara = vara($objekt);
                    $pris = pris($objekt);
                    echo"<img src=\"$katalog/$objekt\">";
                    echo"$vara $pris:-";
                    echo"</label>";
                }
            }
            ?>

            <button>Nästa</button>
        </form>

        <h2>Varukorg</h2>
        <?php
        /* visa innhållet på varukorgen = varukorg.txt */
        $filnamn = "varukorg.txt";

        /* ta emot data */
        $vara = filter_input(INPUT_POST, 'vara', FILTER_SANITIZE_STRING);

        if ($vara) {
            /* spara ner i textfilen varukorg.txt */
            $handtag = fopen($filnamn, 'a');
            fwrite($handtag, "$vara\n");
            fclose($handtag);
        }

            $filename = "varukorg.txt";
            if (is_readable($filename)) {
                $lines = file('varukorg.txt');
                $total = 0;
                echo"<table>";
                echo"<thead>";
                echo"<tr><th>Vara</th><th>Pris</th></tr>";
                echo"</thead>";
                echo"<tbody>";
                foreach ($lines as $line) {
                    $vara = vara($line);
                    $pris = pris($line);
                    $total = $total + $pris;
                    echo"<tr><td>$vara</td><td>$pris:-</td></tr>";
                }
                echo"</tbody>";
                echo"<tfoot>";
                echo"<tr><td>Total:</td><td>$total:-</td></tr>";
                echo"</tfoot";
                echo"</table>";
            }else {
                echo"<p>Varukorgen är tom!</p>";
            }
        ?>
        <a href="./steg1-cpu.php">börja om!</a>
    </div>
</body>
</html>