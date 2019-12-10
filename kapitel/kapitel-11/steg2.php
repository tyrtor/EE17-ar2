<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sessioner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="konatiner">
        <?php
            session_start();
            echo"<p>{$_SESSION["namn"]}</p>";
            
        ?>
    </div>
</body>
</html>