<?php
/* har man tryckt på knappen "submit" */
if (isset($_POST['submit'])) {
    /* läs av filen */
    $file = $_FILES['fil'];

    /* vad är filnamnet */
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    /* plocka ut filendelsen */
    $fileExt = explode('.', $fileName);
    $fileAcutualExt = strtolower(end($fileExt));

    /* Vilka bildtyper tillåter vi */
    $allowed = array('jpg', 'jpeg', 'png', 'webp', 'gif' );
    /* testa att filtypen är tillåten */
    if (in_array($fileAcutualExt, $allowed)) {

        /* testa om det blev nåt fel */
        if ($fileError === 0) {

            /* kolla om bilden är för stor */
            if ($fileSize < 1000000) {

                /* skapa ett nytt unikt filnamn så att vi inte sparar över */
                $fileNameNew = uniqid('', true).".$fileAcutualExt";
                $fileDestination = "shop-bilder/$fileNameNew";
                /* äntligen, nu flyttar vi filen in i rätt katalog */
                move_uploaded_file($fileTmpName, $fileDestination);
                /* vi hoppar direkt tillbaka till formuläret och skickar med ett meddelande  */
                header("Location: admin.php?uploadsuccess=1");

            }else {
                echo"<p>Filen är för stoooor! Den måste vara mindre än 1Mb</p>";
            }

        }else {
            echo"<p>Oj oj oj. Något gick fel, prova igen!</p>";
        }

    }else {
        echo"<p>Du kan inte ladda upp bilder av denna typ!</p>";
    }

}
?>