<?php
/*
* PHP version 7
* @category   Hjälpfunktioner
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
        <h1>Varukorg</h1>
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