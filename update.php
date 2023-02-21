<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    } else {
    }
} catch (PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        $sql = "UPDATE achtbaan
            Set     naam_achtbaan = :naam_achtbaan,
            naam_pretpark = :naam_pretpark,
            naam_land = :naam_land,
            topsnelheid = :topsnelheid,
            hoogte = :hoogte,
            datum = :datum,
            cijfer = :cijfer
                WHERE   Id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
        $statement->bindValue(":naam_achtbaan", $_POST["naam_achtbaan"], PDO::PARAM_STR);
        $statement->bindValue(":naam_pretpark", $_POST["naam_pretpark"], PDO::PARAM_STR);
        $statement->bindValue(":naam_land", $_POST["naam_land"], PDO::PARAM_STR);
        $statement->bindValue(":topsnelheid", $_POST["topsnelheid"], PDO::PARAM_STR);
        $statement->bindValue(":hoogte", $_POST["hoogte"], PDO::PARAM_STR);
        $statement->bindValue(":datum", $_POST["datum"], PDO::PARAM_STR);
        $statement->bindValue(":cijfer", $_POST["cijfer"], PDO::PARAM_STR);

        $statement->execute();

        echo "het record is geupdate";
        header('location: read.php');

        exit();
    } catch (PDOException $e) {
        echo "het record is niet geupdate, probeer het opnieuw";
        header("location: read.php");
    }
}

$sql = "SELECT Id
              ,naam_achtbaan as NA
              ,naam_pretpark as NP
              ,naam_land as NL
              ,topsnelheid as TS
              ,hoogte as H
              ,datum as D
              ,cijfer as C
        FROM achtbaan
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>


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
    <h3>Invoer Achtbaan</h3>

    <form action="update.php" method="post">
        <fieldset>
            <label for="naam_achtbaan">Naam Achtbaan:</label>
            <br>
            <input type="text" name="naam_achtbaan" id="naam_achtbaan" value="<?= $result->NA ?>">
            <br>
            <label for="naam_pretpark">Naam Pretpark:</label>
            <br>
            <input type="text" name="naam_pretpark" id="naam_pretpark" value="<?= $result->NP ?>">
            <br>
            <label for="naam_land">Naam Land:</label>
            <br>
            <input type="text" name="naam_land" id="naam_land" value="<?= $result->NL ?>">
            <br>
            <label for="topsnelheid">Topsnelheid (km/u):</label>
            <br>
            <input type="number" name="topsnelheid" id="topsnelheid" min="1" max="200" value="<?= $result->TS ?>">
            <br>
            <label for="hoogte">Hoogte (m):</label>
            <br>
            <input type="number" name="hoogte" id="hoogte" min="1" max="200" value="<?= $result->H ?>">
            <br>
            <label for="datum">Datum eerste opening:</label>
            <br>
            <input type="date" name="datum" id="datum" value="<?= $result->D ?>">
            <br>
            <label for="cijfer" value="<?= $result->C ?>">Cijfer voor achtbaan:</label>
            <br>
            <input type="range" name="cijfer" id="cijfer" min="1" max="10" step="0.1" oninput="num.value = this.value" value="<?= $result->C ?>">
            <output id="num">5.5</output>
            <br>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input id="submit" type="submit" value="Sla op">
        </fieldset>
    </form>
</body>

</html>