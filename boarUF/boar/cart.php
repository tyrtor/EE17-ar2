<?php
session_start();
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
    var_dump($_POST['action']);
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["code"] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"])) {
                unset($_SESSION["shopping_cart"]);
            }

        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    var_dump($_POST['action'], $_POST['code'], $_POST['quantity']);
    foreach ($_SESSION["shopping_cart"] as &$value) {
        var_dump($value);
        if ($value['code'] === $_POST["code"]) {
            $value['quantity'] = $_POST["quantity"];
            var_dump($value);
            break; // Stop the loop after we've found the product
        }
    }

}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="cart">
<?php
if (isset($_SESSION["shopping_cart"])) {
    $total_price = 0;
    ?>
<table class="table">
<tbody>
<tr>
    <td></td>
    <td>ITEM NAME</td>
    <td>QUANTITY</td>
    <td>UNIT PRICE</td>
    <td>ITEMS TOTAL</td>
</tr>
<?php
//var_dump($_SESSION["shopping_cart"]);
    foreach ($_SESSION["shopping_cart"] as $product) {
        ?>
<tr>
    <td>
        <img src='https://boaruf.se/bilder/produkter/<?php echo $product["bild"]; ?>' width="50" height="40" />
    </td>
    <td><?php echo $product["namn"]; ?><br />
        <form method='post' action=''>
            <input type='hidden' name='code' value="<?php echo $product["kod"]; ?>" />
            <input type='hidden' name='action' value="remove" />
            <button type='submit' class='remove'>Remove Item</button>
        </form>
    </td>
    <td>
        <form method='post' action=''>
            <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
            <input type='hidden' name='action' value="change" />
            <select name='quantity' class='quantity' onChange="this.form.submit()">

                <option <?php if ($product["quantity"] == 1) {echo "selected";}?> value="1">1</option>
                <option <?php if ($product["quantity"] == 2) {echo "selected";}?> value="2">2</option>
                <option <?php if ($product["quantity"] == 3) {echo "selected";}?> value="3">3</option>
                <option <?php if ($product["quantity"] == 4) {echo "selected";}?> value="4">4</option>
                <option <?php if ($product["quantity"] == 5) {echo "selected";}?> value="5">5</option>

            </select>
        </form>
    </td>
    <td><?php echo "$" . $product["pris"]; ?></td>
    <td><?php echo "$" . $product["pris"] * $product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["pris"] * $product["quantity"]);
    }
    ?>
<tr>
    <td colspan="5" style="align:right;">
        <strong>TOTAL: <?php echo "$" . $total_price; ?></strong>
    </td>
</tr>
</tbody>
</table>
<?php
} else {
    echo "<h3>Your cart is empty!</h3>";
}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<form action="#" method="post">
        <label for="namn">namn</label>
        <input type="text" name="namn" id="namn">
        <label for="email">email</label>
        <input type="email" name="email" id="eamil">
        <label for="amne">ämne</label>
        <input type="text" name="amne" id="amne">
        <button>Skicka</button>
    </form>
    <?php
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$amne = filter_input(INPUT_POST, 'amne', FILTER_SANITIZE_STRING);
$antal = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);

if ($namn && $email && $amne) {
    $to = $email;
    $subject = $amne;

    $message = "foreach ($_SESSION[shopping_cart] as $product) {";
    $message .= "<tr>";
    $message .= "<td>";
    $message .= "<img src='https://boaruf.se/bilder/produkter/$product[bild]' width=\"50\" height=\"40\" />";
    $message .= "</td>";
    $message .= "<td>$product[namn]; <br />";
    $message .= "<form method='post' action=''>";
    $message .= "<input type='hidden' name='code' value=\"$product[kod]\" />";
    $message .= "<input type='hidden' name='action' value=\"remove\" />";
    $message .= "</form>";
    $message .= "</td>";
    $message .= "<td>";
    $message .= "<form method='post' action=''>";
    $message .= "<input type='hidden' name='code' value=\"$product[kod]; \" />";
    $message .= "<input type='hidden' name='action' value=\"change\" />";
    $message .= "</form>";
    $message .= "</td>";
    $message .= "<td>\"$\" . $product[pris]; </td>";
    $message .= "<td>\"$\" . $product[pris] * $product[quantity]; </td>";
    $message .= "</tr>";
    $message .= "<?php $total_price += ($product[pris] * $product[quantity]);";

    // It is mandatory to set the content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers. From is required, rest other headers are optional
    $headers .= 'From: <emil.linder@boaruf.se>' . "\r\n";

    mail($to, $subject, $message, $headers);

    echo "mailet är skickat";
} else {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
?>
</body>
</html>