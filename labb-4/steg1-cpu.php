<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop - steg 1 - CPU</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>bygg din egna PC - Steg 1</h1>
        <h2>Varukorg</h2>
        <?php
        /* visa innhållet på varukorgen = varukorg.txt */
            $filename = "varukorg.txt";
            if (is_readable($filename)) {
                $lines = file('varukorg.txt');

                foreach ($lines as $line) {
                    echo"<p>$line</p>";
                }
            }else {
                echo"<p>Varukorgen är tom!</p>";
            }
        ?>
        <h2>Välj CPU</h2>
        <form action="" method="post">
            <?php
            /* lista alla produkter */
            $katalog = "./shop-bilder/cpu";
            $resultat = scandir($katalog);

            foreach ($resultat as $objekt) {
                $info = pathinfo("./$objekt");

                if ($info['extension'] == 'jpg') {
                    echo"<label>";
                    echo"<input type=\"radio\" name=\"vara\"><img src=\"$katalog/$objekt\"><p>$objekt</p><br>";
                    echo"</label>";
                }
            }
            ?>

            <button>Nästa</button>
        </form>
    </div>
</body>
</html>