<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="boar.css">
</head>
<body>
    <div class="kontainer">
        <form action="./loggedIn.php" method="post">
<table>
    
                <tr>
                    <td><label for="namn">För- och Efternamn</label></td>
                    <td><input type="text" name="namn" id="" required></td>
                    <td><input type="text" name="namn" id="" required></td>
                </tr>
    
    
    
                <tr>
                    <td><label for="email">Emailaddress</label></td>
                    <td><input type="email" name="email" required></td>
                </tr>
    
    
    
                <tr>
                    <td><label for="aNamn">Användarnamn</label></td>
                        <td><input type="text" name="aNamn" required placeholder="Användarnamn"></td>
                </tr>
    
    
    
                <tr>
                    <td>
                        <label for="losen">Lösenord</label>
                    </td>
                    <td>
                        <input type="password" name="losen" required placeholder="Lösenord">
                    </td>
                </tr>
    
    
    
                <tr>
                    <td><label for="uLosen">Upprepa ditt Lösenord</label></td>
                    <td><input type="password" name="uLosen" required placeholder="Lösenord"></td>
                </tr>
    
    
                <tr>
                    <td><button>Logga in</button></td>
                </tr>
</table>

            <p><a href="./login.php">Har du redan ett konto?</a></p>
        </form>
    </div>
    <?php
    $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $aNamn = filter_input(INPUT_POST, 'aNamn', FILTER_SANITIZE_STRING);
    $losen = filter_input(INPUT_POST, 'losen', FILTER_SANITIZE_STRING);
    $uLosen = filter_input(INPUT_POST, 'uLosen', FILTER_SANITIZE_STRING);

    if ($aNamn && $losen && $namn && $email && $uLosen) {
        if (strlen($losen < 8)) {
            echo "<p>Ditt lösenord måste vara längre än 8 täcken.</p>";
        }
        if (preg_match("/^[a-zåäö0-9¤%&\/*]+/i", $losen)) {
            echo "<p>ditt lösenord måste innhålla minst ett specialtecken(¤%&\/*), minst en stor bokstav och minst en siffra</p>";
        }
        if (!$uLosen == $losen) {
            echo "<p>Ditt lösenord måste vara likadant!</p>";
        }
        
    }
?>
</body>
</html>