<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $katalog = "..";

    /* saknna katalogen */
    $resultat = scandir($katalog);


    /* skriv ut allt vi hittade */
    foreach ($resultat as $objekt) {
        if ($objekt !='.' && $objekt !='..') {

            if (is_dir("$katalog/$objekt")) {
                echo"<p>Katalog: $objekt</p>";
            }else{
                echo"<p>Fil: $objekt</p>";
                $filinfo = pathinfo($objekt);
                $filtyp = $filinfo['extension'];
                echo "<p>filtypen är $filtyp</p>";
            }
            
        }
        
        
    }
    ?>
</body>
</html>