<?php
include_once "./konfig-db.php";
/* ta emot Post-data */
$namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);

/* kontrollera att data finns */
if ($namn) {
    echo "Mottaget: $namn";

    /* spara namnet i tabellen på databasen */
    $sql = "INSERT INTO pong SET namn='$namn'";
    $result = $conn->query($sql);

    /* kolla på svaret från databasen */
    if (!$result) {
        die("Något blev fel med SQL: $conn->error");
    }else {
        echo "Namnet har sparats!";
    }
}else {
    echo "Något blev fel!";
}