<?php
/* har man tryckt på knappen "submit" */
if (isset($_POST['submit'])) {
    /* läs av filen */
    $file = $_FILES['file'];
    var_dump($file);
    /* vad är filnamnet */
    $filename = $file['name'];
}
?>