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
            Set     blue = :blue,
                    pink = :pink,
                    purple = :purple,
                    red = :red,
                    tel = :tel,
                    email = :email,
                    datum = :datum
                    nagelbijt = :nagelbijt,
                    luxemanicure = :luxemanicure,
                    nagelreparatie = :nagelreparatie
                WHERE   Id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
        $statement->bindValue(":blue", $_POST["blue"], PDO::PARAM_STR);
        $statement->bindValue(":pink", $_POST["pink"], PDO::PARAM_STR);
        $statement->bindValue(":purple", $_POST["purple"], PDO::PARAM_STR);
        $statement->bindValue(":red", $_POST["red"], PDO::PARAM_STR);
        $statement->bindValue(":tel", $_POST["tel"], PDO::PARAM_STR);
        $statement->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $statement->bindValue(":datum", $_POST["datum"], PDO::PARAM_STR);
        $statement->bindValue(":nagelbijt", $_POST["nagelbijt"], PDO::PARAM_STR);
        $statement->bindValue(":luxemanicure", $_POST["luxemanicure"], PDO::PARAM_STR);
        $statement->bindValue(":nagelreparatie", $_POST["nagelreparatie"], PDO::PARAM_STR);

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
              ,blue as B
              ,pink as PI
              ,purple as PU
              ,red as R
              ,tel as T
              ,email as E
              ,datum as D
              ,nagelbijt as NB
              ,luxemanicure as LM
              ,nagelreparatie as NR
        FROM Afspraak
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