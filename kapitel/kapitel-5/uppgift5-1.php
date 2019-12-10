<?php
/*
Gör ett formulär där användaren ska fylla i namn, adress, postnr och postort.
Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken.
Kontrollera att postnumret innehåller 5 tecken och att de tecknen endast är siffror.
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

        <label>Namn</label>
        <input type="text" name="namn">
        <label>Address</label>
        <input type="text" name="address">
        <label>Postnummer</label>
        <input type="text" name="postnummer">
        <label>Postort</label>
        <input type="text" name="postort">


            <button>Skicka</button> 
    </form>
    <?php
    $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $postnummer = filter_input(INPUT_POST, 'postnummer', FILTER_SANITIZE_STRING);
    $postort = filter_input(INPUT_POST, 'postort', FILTER_SANITIZE_STRING);


    if ($namn && $address && $postnummer && $postort) {
        /* Kontrollera att alla fälten är ifyllda, och innehåller minst 3 tecken. */
        $längdNamn = strlen($namn);
        $längdAddress = strlen($address);
        $längdPostnummer = strlen($postnummer);
        $längdPostort = strlen($postort);

        if ($längdNamn < 3) {
            echo "<p>Ditt namn är för kort</p>";
        };

        if ($längdAddress < 3) {
            echo "<p>Din address är för kort</p>";
        };

        if ($längdPostort < 3) {
            echo "<p>Din postort är för kort</p>";
        };

        /* Kontrollera att postnumret innehåller 5 tecken */
        if ($längdPostnummer < 5) {
            echo "<p>Ditt postnummer är för kort</p>";
        };

        /* att de tecknen endast är siffror. */
        if (!is_numeric($postnummer)) {
            echo "<p>Ditt postnummer får endast innehåller siffror</p>";
        }
    } else {
        echo "<p>Vänligen fyll i alla rutor!</p>";
    }


?>
</body>
</html>