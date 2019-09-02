<?php
echo "<h1>Vad är datatyper?</h1>";
?>
<p> vilka datatyper finns det i PHP?</p>
<?php
$förnamn = "Emil";
$ålder = 18;
$telefon = "+460704040993";
$pi = 3.14159;
$harKörkort = true;
$harHus = false;
$ee17 = ["Erik", "Marcus", "Gene", "Emil", "Karim", "Albin", "Carl-Axel", "Pontus"];

echo "<p>$förnamn telefon är $telefon</p>";
echo "<p>jag kan pi. kolla! $pi</p>";
echo "<p>har körkort = $harKörkort</p>";
echo "<p>har hus = $harHus</p>";

print_r ($ee17);
echo $ee17[5];
?>