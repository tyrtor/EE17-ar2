<?php
/*
* Uppgift 7.2
Gör ett webbapp som i en textruta frågar efter ett filnamn på servern. Kontrollera sedan filnamnet så att det endast innehåller bokstäver, siffror och punkt. Om kontrollen ger OK, så öppna filen och skriv ut filinnehållet på skärmen.
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <legend>Lägg till restaurang</legend><br>
        <label>Restaurang</label>
        <input type="text" name="restaurang" required>
        <label>Gata</label>
        <input type="text" name="gata" required>
        <label>Postnummer</label>
        <input type="text" name="postNr" required>
        <label>Ort</label>
        <input type="text" name="ort" required>

        <button>Skicka</button>
    </form>


    <?php
    $restaurang = filter_input(INPUT_POST, 'restaurang', FILTER_SANITIZE_STRING);
    $gata = filter_input(INPUT_POST, 'gata', FILTER_SANITIZE_STRING);
    $postNr = filter_input(INPUT_POST, 'postNr', FILTER_SANITIZE_STRING);
    $ort = filter_input(INPUT_POST, 'ort', FILTER_SANITIZE_STRING);
    if ($restaurang && $gata && $postNr && $ort) {
        $nyRestaurang = "\n$restaurang, $gata, $postNr, $ort";
        $filename = "./restauranger.csv";
        $handtag = fopen($filename, 'a');
        fwrite($handtag, $nyRestaurang);
        fclose($handtag);
    } else {
        echo"<p>Kan inte spara</p>";
    }

?>
</body>
</html>