<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
</head>
<body>
    <div class="kontainer">
        <?php
        /* variabler */
            $filename = "./restauranger.csv";
            $true = "true";
        /* kolla om filen går att använda */
            if (!is_readable($filename)) {
                echo "<p>Filen går inte att använda</p>";
                
            }else{
                /* hämta filen */
                $rader = file("./restauranger.csv");
                /* skapar en array */
                echo"
                <table>
                    <tr><th>Restaurang namn</th><th>Gata</th><th>Postnummer</th><th>Ort</th></tr>";
                foreach ($rader as $rad) {
                    $tabel = explode(", ", $rad);
                    echo "<tr><td>$tabel[0]</td>";
                    echo "<td>$tabel[1]</td>";
                    echo "<td>$tabel[2]</td>";
                    echo "<td>$tabel[3]</td></tr>";
                }

                echo"</table>";
            }

        
        ?>
    </div>
</body>
</html>