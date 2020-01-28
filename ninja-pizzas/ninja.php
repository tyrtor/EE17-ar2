<?php
/*
 * PHP version 7
 * @category   ...
 * @author     Emil Linder <emil@familjenlinder.se>
 * @license    PHP CC
 */
include_once "./konfig-db.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ninja Pizza</title>
    <link rel="stylesheet" href="pizzas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="grey lighten-4">
	<nav class="white z-depth-0">
    <div class="container">
      <a href="#" class="brand-logo brand-text">Ninja Pizza</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="#" class="btn brand z-depth-0">Add a Pizza</a></li>
      </ul>
    </div>
  </nav>

  <?php
/* logga in på mysql-servern och välj databas */
$conn = new mysqli($host, $användare, $lösenord, $databas);

/* Gick det att ansluta? */
if ($conn->connect_error) {
    die("Kunde inte ansluta till databasen: " . $conn->connect_error);
}

/* SQL??? */
$sql = "SELECT title, ingredienser, id FROM pizzas ORDER BY cerated_at";
$resultat = $conn->query($sql);
/* bearbeta svaret från databasen */
while ($rad = $resultat->fetch_assoc()) {
    echo "<table>";
    echo "<tr><th>Namn</th><th>Ingredienser</th><th>Datum</th></tr>";
}
/* stäng ned anslutningen */
$conn->close();
?>

	<footer class="section">
		<div class="center grey-text">&copy; Copyright 2019 Ninja Pizzas</div>
	</footer>
</body>
</html>