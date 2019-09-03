<?php
$förnamn = $_REQUEST["förnamn"];
$efternamn = $_REQUEST["efternamn"];
$mobil = $_REQUEST["mobil"];
$kön = $_REQUEST["kon"];
$hjälte = $_REQUEST["hjalte"];
$fotbollslag = $_REQUEST["fotbollslag"];
$övrigt = $_REQUEST["kommentar"];
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="kontainer">
    <?php
    echo "<h1>Bekräftelse</h1>";
    echo "<h3>Hej $förnamn $efternamn. Tack för din beställning!</h3>";
    echo "<p>Kontrollera att allt du skrivit är rätt.</p>";
    echo "<p>Förnamn: $förnamn</p>";
    echo "<p>Efternamn: $efternamn</p>";
    echo "<p>Mobil nummer: $mobil</p>";
    echo "<p>Kön: $kön</p>";
    echo "<p>Favorit superhjälte: $hjälte</p>";
    echo "<p>Fotbollslag: $fotbollslag</p>";
    echo "<p>Övrig kommentar: $övrigt</p>";
    ?>
</div>

</body>
</html>
