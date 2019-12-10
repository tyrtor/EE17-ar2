<?php
/*
Skriv en webbapp som tar ett tal mellan 1 och 9 och sedan returnerar det svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så returnerar du i stället talet som vanligt (tex. 11).
* PHP version 7
* @category   Omvandla text till morsekod
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

    <form action="./uppgift4-5.php" method="post">
        <legend>omvandla text till morsekod</legend><br>

        <label>texten</label>
        <textarea name="texten" cols="30" rows="10" required></textarea>

            <button>Skicka</button> 
    </form>

    <?php
    $texten = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);

    if ($texten) {
        $morse['A'] = '.-';
        $morse['B'] = '-...';
        $morse['C'] = '-.-.';
        $morse['D'] =  '-..';
        $morse['E']=  '.';
        $morse['F'] = '..-.';
        $morse['G'] = '--.';
        $morse['H'] = '....';
        $morse['I'] =  '..';
        $morse['J'] = '.---';
        $morse['K'] = '-.-';
        $morse['L'] = '.-..';
        $morse['M'] = '--';
        $morse['N'] = '-.';
        $morse['O'] = '---';
        $morse['P'] = '.--.';
        $morse['Q'] = '--.-';
        $morse['R'] = '.-.';
        $morse['S'] = '...';
        $morse['T'] = '-';
        $morse['U'] = '..-';
        $morse['V'] = '...-';
        $morse['W'] = '.--';
        $morse['X'] = '-..-';
        $morse['Y'] = '-.--';
        $morse['Z'] = '--..';
        $morse['Å'] = '.--.-';
        $morse['Ä'] = '.-.-';
        $morse['Ö'] = '---.';
        $morse[' '] = ' ';

        $texten = mb_strtoupper($texten);
        $delar = str_split($texten);
        //var_dump($delar);
        /* skriv ut talet i bokstavsform */
        echo "<form id=\"demo\"><label>$texten</label><input type=\"text\" pattern=\"[.\- ]+\" name=\"code\" value=\"";

        foreach ($delar as $bokstav) {
            if (array_key_exists($bokstav, $morse)) {
                echo "$morse[$bokstav] ";
            }
           
        }
        echo "\"><button>Spela Upp</button></form>";
    }


?>
<!--     <form id="demo">
    <input type="text" pattern="[.\- ]+" name="code" value="-.-. --... ... -.- -.--" >
    <button>Play</button>
</form> -->
<script src="./morse.js"></script>
</body>
</html>