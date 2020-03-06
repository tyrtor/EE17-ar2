<?php
session_start();
include 'db.php';
$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    $result = mysqli_query(
        $con,
        "SELECT * FROM `boarwear` WHERE `kod`='$code'"
    );
    $row = mysqli_fetch_assoc($result);
    $name = $row['namn'];
    $code = $row['kod'];
    $price = $row['pris'];
    $image = $row['bild'];
    var_dump($row);

    /* lagrar alla produkter i en array */
    $cartArray = array(
        $code => array(
            'name' => $name,
            'code' => $code,
            'price' => $price,
            'quantity' => 1,
            'image' => $image),
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($code, $array_keys)) {
            $status = "<div class='box' style='color:red;'> Product is already added to your cart!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
            );
            $status = "<div class='box'>Product is added to your cart!</div>";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boarwear</title>

    <link rel="stylesheet" href="../css/boar.css" media="screen" title="no title" charset="utf-8">
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
</head>
<body>
    <a href="index.html"><img src="../bilder/boarlogo1.jpg" class="sticky" alt="logga med ett vildsvin"></a>
    <div class="dropdown-container">
        <div class="dropdown">
            <a href="index.html"><button class="dropbtn">Hem</button></a>
        </div>
        <div class="dropdown aktiv">
            <a href="produkter.php"><button class="dropbtn">Produkter</button></a>
        </div>
        <div class="dropdown">
            <a href="kontakt.html"><button class="dropbtn">Kontakt</button></a>
        </div>
        <div class="dropdown">
            <a href="om-oss.html"><button class="dropbtn">Om oss</button></a>
        </div>
    </div>
    <!-- start av content -->
    <h2>Kläder</h2>
    <p>Våra kläder kommer att finnas till försäljning inom snar framtid</p>


<?php
if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    ?>
<div class="cart_div">
<a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class='grid-container'>

<?php
$result = mysqli_query($con, "SELECT * FROM boarwear");
var_dump($result);
while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <form method='post' action=''>
    <input type='hidden' name='code' value=" . $row['kod'] . " />
    <div class='image grid-item'><img src='../bilder/produkter/" . $row['bild'] . "' /></div>
    <div class='name grid-item'>" . $row['namn'] . "</div>
    <div class='price grid-item'>$" . $row['pris'] . "</div>
    <button type='submit' class='buy grid-item'>Buy Now</button>
    </form>
    ";
}
echo "</div>";
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

    <footer class="grid-container">
        <div class="grid-item">
            <h4><a href="kontakt.html">Kontakt</a></h4>
            <img class="nummer" src="../bilder/nummer.PNG" alt="070 - 954 11 95">
            <a href="mailto: boar.wear.uf@gmail.com">Email: boar.wear.uf@gmail.com</a>
        </div>
        <div class="grid-item">
            <h4>Du hittar oss på</h4>
            <p>Instagram</p>
            <p>Facebook</p>
        </div>
        <div class="grid-item">
            <h4>Boar UF</h4>
            <p>Vi är ett UF-företag som brinner för sport och framförallt innebandy... <a href="om-oss.html">läs mer</a></p>
        </div>
    </footer>
</body>
</html>