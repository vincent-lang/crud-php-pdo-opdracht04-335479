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

        $sql = "UPDATE Afspraak
            Set     blue = :blue,
                    pink = :pink,
                    purple = :purple,
                    red = :red,
                    tel = :tel,
                    email = :email,
                    datum = :datum,
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
    <title>Nagelstudio Chantal</title>
</head>
<body>
    <h3>Bling Bling Nagelstudio Chantal</h3>

    <form action="update.php" method="post">
        <fieldset>
        <p>Kies 4 basis kleuren voor uw nagels:</p>
        <label for="blue">color1:</label>
        <input type="color" name="blue" id="blue" value="<?= $result->B ?>">
        <label for="pink">color2:</label>
        <input type="color" name="pink" id="pink" value="<?= $result->PI ?>">
        <label for="purple">color3:</label>
        <input type="color" name="purple" id="purple" value="<?= $result->PU ?>">
        <label for="red">color4:</label>
        <input type="color" name="red" id="red" value="<?= $result->R ?>">
        <br>
        <label for="tel">Uw telefoonnummer:</label>
        <input type="tel" name="tel" id="tel" pattern=".{3,16}" placeholder="+31 6 30694820" required value="<?= $result->T ?>">
        <br>
        <label for="email">Uw e-mailadres:</label>
        <input type="email" name="email" id="email" placeholder="randomperson@example.com" required value="<?= $result->E ?>">
        <br>
        <label for="datum">Afspraak datum:</label>
        <input type="datetime-local" name="datum" id="datum" required value="<?= $result->D ?>">
        <br>
        <label for="nagelbijt">Nagelbijt arrangement (termijnbetaling mogelijk) €180</label>
        <input type="checkbox" name="nagelbijt" id="nagelbijt" value="<?= $result->NB ?>">
        <label for="luxemanicure">Luxe manicure (massage en handpakking) €30,00</label>
        <input type="checkbox" name="luxemanicure" id="luxemanicure" value="<?= $result->LM ?>">
        <label for="nagelreparatie">Nagelreparatie per nagel (in eerste week gratis) €5,00</label>
        <input type="checkbox" name="nagelreparatie" id="nagelreparatie" value="<?= $result->NR ?>">
        <br>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input id="submit" type="submit" value="Sla op">
        </fieldset>
    </form>
</body>

</html>