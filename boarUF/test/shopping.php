<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop - steg 1 - CPU</title>
    <link rel="stylesheet" href="./boar.css">
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
        <h2></h2>
        <form action=".php" method="post">
            <?php
            /* lista alla produkter */
            $katalog = "../bilder/";
            $resultat = scandir($katalog);

            foreach ($resultat as $objekt) {
                $info = pathinfo("./$objekt");

                if ($info['extension'] == 'jpg' || $info['extension'] == 'PNG' || $info['extension'] == 'webp') {
                    echo"<label>";
                    echo"<input type=\"number\" name=\"vara\" value=\"$objekt\" required>";
                    /* $vara = vara($objekt);
                    $pris = pris($objekt); */
                    echo"<img src=\"$katalog/$objekt\">";
                    /* echo"$vara $pris:-"; */
                    echo"</label>";
                }
            }
            ?>

            <button>Nästa</button>
        </form>
    </div>
</body>
</html>