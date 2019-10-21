<?php
/*
Gör ett webbapp som tar den inmatade texten ur ett formulärs "textarea" och sparar den i en fil.
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

        <label>Texten</label>
        <textarea name="texten" cols="30" rows="10" required placeholder="Skriv din personliga text här"></textarea>

        <label>Filnamn</label>
        <input type="text" required>


            <button>Skicka</button> 
    </form>
<?php
    $texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);
    $filnamn = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
    if ($texten && $filnamn) { 
        $handtag = fopen($filnamn, 'w');

        fwrite($handtag, $texten);

        fclose($handtag);
        
        file_put_contents($filnamn, $texten);

    }
?>
</body>
</html>