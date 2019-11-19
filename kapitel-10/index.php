<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

        <h1>Ladda upp filer</h1>
        <?php
            $uploadSuccess = filter_input(INPUT_GET, 'uploadsuccess', FILTER_SANITIZE_STRING);
            if ($uploadSuccess) {
                echo"<p>filen laddades upp!</p>";
            }
        ?>
        <label>Ladda upp din fil</label>
        <input type="file" name="file">
        <button type="submit" name="submit">Ladda upp</button> 
    </form> 
  
</body>
</html>