<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
        <legend>Ladda upp filer</legend><br>

        <label>Ladda upp din fil</label>
        <input type="file" name="file">
        <button type="submit" name="submit">Ladda upp</button> 
    </form>    
</body>
</html>