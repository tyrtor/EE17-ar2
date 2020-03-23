<?php
include_once "./konfig-db.php";
/* ta emot Post-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
$poäng = filter_input(INPUT_POST, "poäng", FILTER_SANITIZE_STRING);

/* kontrollera att data finns */
if ($namn) {
    echo "Mottaget: $namn $poäng";

    $sql = "UPDATE pong SET poäng='$poäng' WHERE namn='$namn'";
    $result = $conn->query($sql);

    if (!$result) {
        die("Något har gått snett med SQL: $conn->error");
    }else {
        echo "Poängen har sparats!";
    }
}else {
    echo "Något blev fel!";
}