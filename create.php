<?php

require("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    } else {
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO Afspraak (Id
                        ,blue
                        ,pink
                        ,purple
                        ,red
                        ,tel
                        ,email
                        ,datum
                        ,nagelbijt
                        ,luxemanicure
                        ,nagelreparatie)
            VALUES      (NULL
                        ,:blue
                        ,:pink
                        ,:purple
                        ,:red
                        ,:tel
                        ,:email
                        ,:datum
                        ,:nagelbijt
                        ,:luxemanicure
                        ,:nagelreparatie);";
$statement = $pdo->prepare($sql);

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

header("location: read.php");
