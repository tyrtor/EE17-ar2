<?php
/*
* PHP version 7
* @category   login med hash
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <form action="#" method="post">
            <h1>Logga in</h1>
            <label for="aNamn">Användarnamn</label>
            <input type="text" name="aNamn" id="aNamn" required>

            <label for="losen">Lösenord</label>
            <input type="password" name="losen" id="losen" required>

            <button>Logga in</button>
        </form>
        <?php
            $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
            $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);

            $fran = filter_input(INPUT_GET, 'fran', FILTER_SANITIZE_STRING);
            if ($aNamn && $losen) {
                $fil = "losen.txt";
                $rader = file($fil) or die("filen går ej att öppna!");

                foreach ($rader as $rad) {
                    $delar = explode(' ', $rad);
                    $anvNam = $delar[0];
                    $hash = $delar[1];
                    if ($anvNam == $aNamn) {
                        if (password_verify($losen, $hash)) {
                            echo"<p>Du är inloggad</p>";
                            exit();
                        }else{
                            echo"<p>Lösenordet stämmer inte </p>";
                            exit();
                        }

                    }
                }
                echo"<p>Användarnamnet eller Lösenordet hittas inte </p>";
            }
                
        ?>
    </div>
</body>
</html>