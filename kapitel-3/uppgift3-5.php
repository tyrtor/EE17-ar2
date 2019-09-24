<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Gör ett skript som är en lånekalkylator. Mha radioknappar ska användaren kunna välja mellan 1, 3 och 5 års lånetid. I en ruta ska användaren skriva i lånebeloppet och i nästa räntan i hela procent. -->

    <form action="./skript3-5.php" method="Get">
        <legend>Lånekalkylator</legend><br>

        <label>Lånebelopp</label>
        <input type="number" name="belopp" required>


        <label>Ränta</label>
        <input type="number" name="ranta" required>

        <label>Lånetid</label>
        <div>
            <input type="radio" name="tid" value="1">1 år
            <input type="radio" name="tid" value="3">3 år
            <input type="radio" name="tid" vlaue="5">5 år
        </div>

        
        <button>Skicka</button>
    </form>
</body>
</html>