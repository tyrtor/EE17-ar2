<?php
/*
* PHP version 7
* @category   PHP grunder 
* @author     Emil Linder
* @license    PHP CC
*/
?>
<?php
echo "<h1>";
echo "hello world";
echo "</h1>";
echo '<h2>';
echo 'hello it\'s nice to see you';
echo '</h2>';
echo "<br>";
$namn = "Emil";
$mittEfternamn = "Linder";
$ålder = "18";
$gatuAddress = "krysshammarsvägen 32";

echo $namn;
echo "<br>";
echo $mittEfternamn;
echo "<br>";

/* hur man sätter ihop text */
echo "mitt namn är " . $namn . " och mitt efternamn är " . $mittEfternamn . "<br>";

echo " min ålder är " . $ålder . "<br>";

echo "Hej, mitt namn är $namn och mitt efternamn är $mittEfternamn. Jag är $ålder år gammal och bor på $gatuAddress<br>";

echo 'Hej, mitt namn är $namn och mitt efternamn är $mittEfternamn. Jag är $ålder år gammal och bor på $gatuAddress<br>';

echo $_
