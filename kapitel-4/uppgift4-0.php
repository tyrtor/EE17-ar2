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
    if (isset($_post["namn"])) {
    
        /* ta emot data */
        $namn = filter_input("input_post", $namn, FILTER_DEFAULT );
        print_r($namn);
}

?>
</body>
</html>