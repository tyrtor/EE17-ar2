<?php
include_once "./konfig-db.php";

$sql = "SELECT * FROM pong ORDER BY poäng DESC LIMIT 5";
$result = $conn->query($sql);

/* kolla på svaret från databasen */
if (!$result) {
    die("Något blev fel med SQL: $conn->error");
}else {
    
    echo"<table>";
    while ($rad = $result->fetch_assoc()) {
        $datum = new DateTime($rad['datum']);
        echo"<tr>
        <td>$rad[namn]</td> 
        <td>$rad[poäng]</td>
        <td>" . $datum->format('d/m Y') . "</td>
        </tr>";
    }
    echo"</table>";
}