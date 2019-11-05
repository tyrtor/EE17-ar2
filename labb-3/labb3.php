<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="kontainer">
        <h1>Filhantering</h1>
        <?php
            $katalog = "../kapitel-2";
    
            echo"<table>";
    
            $resultat = scandir($katalog);
    
            echo "<tr><th> </th><th>Filnamn</th><th>Filtyp</th></tr>";
    
            foreach ($resultat as $objekt) {
                if ($objekt != '.' && $objekt != '..') {
                    if (is_dir("$katalog/$objekt")) {
                        echo "<tr><td><i class=\"fa fa-folder\"></i></td><td>$objekt</td><td> </td></tr>";
                    }else {
                        $filinfo = pathinfo($objekt);
                        $filtyp = $filinfo['extension'];
                        
                        if ($filtyp == 'jpg' || $filtyp == 'png') {
                            echo "<tr><td><img src=\"$katalog/$objekt\"></td><td>$objekt</td><td>$filtyp</td></tr>";
                        }else {
                            echo "<td><i class=\"fa fa-file\"></i></td><td>$objekt</td><td>$filtyp</td></tr>";
                        }
                    }
                    
                }
            }
            echo "</table>";
    
        ?>
    </div>
</body>
</html>