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
        <legend>Kontrollera inmatning</legend><br>
        <label>Filnamn</label>
        <input type="text" name="filnamn" required>
        <button>Skicka</button>
    </form>
    <?php
    $filnamn = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
    if ($filnamn) { 
        if (preg_match("/[a-zåäö0-9.]+/i", $filnamn)) {
            echo"<p>filnament är korrekt</p>";
            
            $texten = file_get_contents($filnamn);
            echo"<p>$texten</p>";
        } else {
            echo "<p>filnamnet är inte korrek. Du får endast använda bokstäver, siffror och punkt</p>";
        }
        
    }
?>
</body>
</html>