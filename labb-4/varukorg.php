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
                echo"<table>";
                echo"<tr><th>Vara</th><th>Pris</th></tr>";
                foreach ($lines as $line) {
                    $vara = vara($line);
                    $pris = pris($line);
                    echo"<tr><td>$vara</td><td>$pris</td></tr>";
                }
                echo"</table>";
            }else {
                echo"<p>Varukorgen är tom!</p>";
            }
        ?>
    </div>
</body>
</html>