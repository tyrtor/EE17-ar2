<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="uppgift2-1.css">
</head>
<body>
    <div class="kontainer">
        <h1>svar</h1>
        <?php
/* ta emot data */
$temp = $_REQUEST["temp"];
$riktning = $_REQUEST["riktning"];

if ($riktning == "CF") {
    /* skriv ut svaret F = (9/5)*C + 32 */
    $farenheit = (9/5) * $temp + 32;
    echo "<p>$temp&deg; Celcius är lika med $farenheit&deg; farenheit.</p>";
}
if ($riktning == "FC") {
    /* C = (F - 32)*(5/9) */
    $celcius = ($temp - 32)*(5/9);
    echo "<p>$temp&deg; farenheit är lika med $celcius&deg; Celcus.</p>";

}
if ($riktning == "CK") {
    $kelvin = $temp - 273;
    echo "<p>$temp&deg; Celcius är lika med $kelvin&deg; Kelvin.</p> ";
}

?>
    </div>
</body>
</html>