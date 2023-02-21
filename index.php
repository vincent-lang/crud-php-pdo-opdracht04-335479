<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/anon.png" type="image/x-icon">
    <title>De 5 snelste achtbanen van Europa</title>
</head>
<body>
    <h1>Invoer Achtbaan</h1>
    <form action="create.php" method="post">
        <fieldset>
            <label for="naam_achtbaan">Naam Achtbaan:</label>
            <br>
            <input type="text" name="naam_achtbaan" id="naam_achtbaan">
            <br>
            <label for="naam_pretpark">Naam Pretpark:</label>
            <br>
            <input type="text" name="naam_pretpark" id="naam_pretpark">
            <br>
            <label for="naam_land">Naam Land:</label>
            <br>
            <input type="text" name="naam_land" id="naam_land">
            <br>
            <label for="topsnelheid">Topsnelheid (km/u):</label>
            <br>
            <input type="number" name="topsnelheid" id="topsnelheid" min="1" max="200">
            <br>
            <label for="hoogte">Hoogte (m):</label>
            <br>
            <input type="number" name="hoogte" id="hoogte" min="1" max="200">
            <br>
            <label for="datum">Datum eerste opening:</label>
            <br>
            <input type="date" name="datum" id="datum">
            <br>
            <label for="cijfer">Cijfer voor achtbaan:</label>
            <br>
            <input type="range" name="cijfer" id="cijfer" min="1" max="10" step="0.1" oninput="num.value = this.value">
            <output id="num">5.5</output>
            <br>
            <input id="submit" type="submit" value="Sla op">
        </fieldset>
    </form>
    <script src="js/test.js"></script>
</body>
</html>