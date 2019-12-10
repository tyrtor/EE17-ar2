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

    <form action="./uppgift4-2.php" method="post">
        <legend>Sorterad Namnlista i tabell</legend><br>

        <label>Namnen</label>
        <input type="text" name="namn1" required>
        <input type="text" name="namn2" required>
        <input type="text" name="namn3" required>
        <input type="text" name="namn4" required>
        <input type="text" name="namn5" required>
        <input type="text" name="namn6" required>
        <input type="text" name="namn7" required>
        <input type="text" name="namn8" required>
        <input type="text" name="namn9" required>
        <input type="text" name="namn10" required>

            <button>Skicka</button> 
    </form>
    <?php
    $namn = filter_input_array(INPUT_POST);
    $radNr = 1;

    if ($namn) {
        /* ta emot data */

        /* sortera i bokstavsordning */
        sort($namn);
        /* loopa igenom arrayen och skriv ut namnen */
        echo "<table>";
        echo "<tr><th>Radnummer</th><th>Namn</th></tr>";

        foreach ($namn as $namnet) {
            if ($radNr %2) {
                echo "<tr><td>$radNr</td><td>$namnet</td></tr>";
            } else {
                echo "<tr class=\"grå\"><td>$radNr</td><td>$namnet</td></tr>";
            }
            

            $radNr ++;
        }
        echo "</table>";
}

?>
</body>
</html>