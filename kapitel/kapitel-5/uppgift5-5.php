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
        <legend>passwordmeter</legend><br>

        <label>Lösenord</label>
        <input type="password" name="losen">
            <button>Skicka</button> 
    </form>
<?php
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
    $poäng = 0;
    $vPoäng = 0;
    $gPoäng = 0;
    $sPoäng = 0;
    $spPoäng = 0;
    $lPoäng = 0;

    if ($losen) {
        /* Skall innehålla minst en stor bokstav */
        $versaler = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','Å','Ä','Ö'];
        foreach ($versaler as $tecken) {
            $pos = strpos($losen, $tecken);
            if ($pos !== false) {
                $vPoäng += 1;
            }
        }

        /* skall innehålla minst en liten bokstav */
        $gemener = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','å','ä','ö'];
        foreach ($gemener as $tecken) {
            $pos = strpos($losen, $tecken);
            if ($pos !== false) {
                $gPoäng += 1;
            }
        }

        /* Skall innehålla minst en siffra */
        $siffror = ['0','1','2','3','4','5','6','7','8','9'];
        foreach ($siffror as $tecken) {
            $pos = strpos($losen, $tecken);
            if ($pos !== false) {
                $sPoäng += 1;
            }
        }

        /* skall vara minst 8 täcken */
        if (strlen($losen) >=8) {
            $lPoäng +=1; 
        }
        
        /* Skall innehålla minst ett specialtecken: #%&¤_*-+@?()[]$€ */
        $special = ['#','%','¤','&','_','*','-','+','@','?','(',')',']','[','$','€'];
        foreach ($special as $tecken) {
            $pos = strpos($losen, $tecken);
            if ($pos !== false) {
                $spPoäng += 3;
            }
        }

        echo "<p>Ditt lösenord är $losen</p>";
        echo "<p>Poängen är $vPoäng + $gPoäng + $spPoäng + $sPoäng + $lPoäng</p>";
        
        if ($vPoäng == 0 || $gPoäng == 0 || $spPoäng == 0 || $sPoäng == 0 || $lPoäng == 0) {
            echo "<p>Lösenordet uppfyller inte alla kraven.</p>";
        }else{
            $poäng =  $vPoäng + $gPoäng + $spPoäng + $sPoäng + $lPoäng;
            echo "<p>Poängen är $poäng</p>";
        }
    }
?>
</body>
</html>