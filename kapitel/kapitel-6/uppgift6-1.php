<?php
/*
Bygg på formuläret så att användaren också ska fylla i en e-postadress.
Kontrollera sedan att e-postadressen innehåller ett @, och minst en punkt.
Kontrollera också att e-postadressen är minst sex tecken lång.

Utveckla skriptet i uppgift 6.2 så att det tar bort mellanslag i postnumret och därmed tillåter postnummer inskrivna enligt formen "415 22".
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
        <legend>domännamn kontroll</legend><br>

        <label>Domän</label>
        <input type="text" name="domain">
            <button>Skicka</button> 
    </form>
<?php
$domain = filter_input(INPUT_POST, 'domain', FILTER_SANITIZE_STRING);

    if ($domain) {
        if (preg_match("/.com|.net|.org$/", $domain)) {
            echo "<p>Domännamnet slutar på .com .net .org</p>";
        } else {
            echo "<p>Domännamnet slutar inte på .com .net .org</p>";
        }
    }

    if ($domain) {
        if (preg_match("/[a-z0-9\-]+.(com|net|org)$/", $domain)) {
            echo "<p>Domännamnet slutar på .com .net .org</p>";
        } else {
            echo "<p>Domännamnet slutar inte på .com .net .org</p>";
        }
    }

    if ($domain) {
        if (preg_match("/^[a-z][a-z0-9\-]+.(com|net|org)$/", $domain)) {
            echo "<p>Domännamnet slutar på .com .net .org</p>";
        } else {
            echo "<p>Domännamnet slutar inte på .com .net .org</p>";
        }
    }

    if ($domain) {
        if (preg_match("/^[a-z][a-z0-9\-]{3,195}.(com|net|org)$/", $domain)) {
            echo "<p>Domännamnet slutar på .com .net .org</p>";
        } else {
            echo "<p>Domännamnet slutar inte på .com .net .org</p>";
        }
    }
?>
</body>
</html>