<?php
$adress = "crafords väg 23";
if (preg_match("/väg/", $adress)) {
    echo "<p>texten innehåller väg</p>";
} else {
    echo "<p>texten innehåller inte väg</p>";
}

$adress = "crafords väg 23";
if (preg_match("/2/", $adress)) {
    echo "<p>texten innehåller 2</p>";
} else {
    echo "<p>texten innehåller inte 2</p>";
}
$adress = "crafords väg 23";
if (preg_match("/[0-9]/", $adress)) {
    echo "<p>texten innehåller siffror</p>";
} else {
    echo "<p>texten innehåller inte siffror</p>";
}
$adress = "crafords väg 23";
if (preg_match("/[a-zåäö]/", $adress)) {
    echo "<p>texten innehåller genemner</p>";
} else {
    echo "<p>texten innehåller inte genemner</p>";
}
$adress = "crafords väg 23";
if (preg_match("/[^_]/", $adress)) {
    echo "<p>texten innehåller inte _</p>";
} else {
    echo "<p>texten innehåller _</p>";
}
$adress = "crafords väg 23";
if (preg_match("/a+/", $adress)) {
    echo "<p>texten innehåller en eller flera a</p>";
} else {
    echo "<p>texten innehåller inte en eller flera a</p>";
}
$adress = "crafords väg 23";
if (preg_match("/a{1,2}/", $adress)) {
    echo "<p>texten innehåller en eller 2 a</p>";
} else {
    echo "<p>texten innehåller inte en eller 2 a</p>";
}
$adress = "crafords väg 23";
if (preg_match("/väg|gata/", $adress)) {
    echo "<p>texten innehåller ordet väg eller gata</p>";
} else {
    echo "<p>texten innehåller inte ordet väg eller gata</p>";
}

?>