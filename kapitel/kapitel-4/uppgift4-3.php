<?php
/*
Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så returnerar du i stället talet som vanligt (tex. 11).
* PHP version 7
* @category   Omvandla tal till bokstäver
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
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

    <form action="./uppgift4-3.php" method="post">
        <legend>Nummerlista</legend><br>

        <label>Namnen</label>
        <input type="number" name="tal" required>


            <button>Skicka</button> 
    </form>
    <?php
    $tal = filter_input(INPUT_POST, 'tal', FILTER_SANITIZE_NUMBER_INT);

    if ($tal) {
        $talLista = ['Noll', 'Ett', 'Två', 'Tre', 'Fyra', 'Fem', 'Sex', 'Sju', 'Åtta', 'Nio'];

        if ($tal<10) {
            echo "<p>Talet $tal skrivs $talLista[$tal].</p>";
        } else {
            echo "<p>$tal</p>";
        }
        
    }


?>
</body>
</html>