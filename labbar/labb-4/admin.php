<?php
/*
* PHP version 7
* @category   ...
* @author     Emil Linder <emil@familjenlinder.se>
* @license    PHP CC
*/
include_once "./funktioner.inc.php";
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webbshop - steg 1 - CPU</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>bygg din egna PC</h1>
        <h2>ladda upp en vara</h2>
        <?php
            $uploadSuccess = filter_input(INPUT_GET, 'uploadsuccess', FILTER_SANITIZE_STRING);
            if ($uploadSuccess) {
                echo"<p>filen laddades upp korrekt!</p>";
            }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

            <input type="file" name="fil">

            <label for="kat">Kategori</label>
            <select name="kat" id="kat">
                <option value="chassi">Chassi</option>
                <option value="cpu">CPU</option>
                <option value="disk">Disk</option>
                <option value="grafikkort">Grafikkort</option>
                <option value="kylare">Kylare</option>
                <option value="mobo">Mobo</option>
                <option value="psu">PSU</option>
                <option value="ram">RAM</option>
            </select>

            <label for="namn">Namn</label>
            <input type="text" name="namn" id="namn">

            <label for="pris">Pris</label>
            <input type="text" name="pris" id="pris">

            <button type="submit" name="submit">Ladda upp</button>
        </form>

        <?php
    $kat = filter_input(INPUT_POST, 'kat', FILTER_SANITIZE_STRING);
    $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
    $pris = filter_input(INPUT_POST, 'pris', FILTER_SANITIZE_STRING);

    if ($kat && $namn && $pris) {
    /* läs av filen */
    $file = $_FILES['fil'];
    $fileNamn = $file['name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $fileType = $file['type'];

    /* plocka ut filendelsen */
    $fileExt = explode('.', $fileNamn);
    $fileAcutualExt = strtolower(end($fileExt));

    $allowed = ['jpg', 'jpeg', 'gif', 'webp', 'gif', 'png'];
    if (in_array($fileAcutualExt ,$allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 1000000) {
                $fileNameNew = "$namn-$pris.$fileAcutualExt";
                $fileDestination = "shop-bilder/$kat/$fileNameNew";
                var_dump($fileNameNew, $fileDestination);

                move_uploaded_file($fileNameNew, $fileDestination);
                header("Location: admin.php?uploadsuccess=1");
            }

        }else {
            echo"<p>Det blev ett fel!</p>";
        }
    }else {
        echo"<p>Du kan inte ladda upp denna typ av bild!</p>";
    }
}
    ?>
    </div>
</body>
</html>