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

    <form action="./uppgift4-0.php" method="post">
        <legend>Namnlista</legend><br>

        <label>Namnen</label>
        <input type="text" name="namn[]" required>
        <input type="text" name="namn[]" required>
        <input type="text" name="namn[]" required>
        <input type="text" name="namn[]" required>
        <input type="text" name="namn[]" required>

            <button>Skicka</button> 
    </form>
    <?php
    $namn = filter_input_array(INPUT_POST)["namn"];

    if ($namn) {
        /* ta emot data */
        //print_r($namn);

        /* loopa igenom arrayen och skriv ut namnen */
        foreach ($namn as $namnet) {
            echo "<p>$namnet</p>";
        }
}

?>
</body>
</html>