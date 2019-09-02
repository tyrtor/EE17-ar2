<?php
$title = "Dagens lunch:" . date(' l \v W');
$matställeLista = ["Tacobar", "Subway", "La Grande", "Falafelkungen", "Kebabkungen", "Mamma Mia", "Fafas"];
$slumptal = rand(0, 6);
$matställe = $matställeLista[$slumptal];

var_dump($matställelista);

$antal = count($matställelista);


$betyg = "grymt gott varje dag";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Bästa matstället</h1>
        <div class="mat">
            <h2><?php echo $matställe ?></h2>
            <p><?php echo $betyg;?></p>
        </div>
    </div>
</body>
</html>