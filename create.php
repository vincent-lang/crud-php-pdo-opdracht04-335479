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

$sql = "INSERT INTO achtbaan (Id
                        ,naam_achtbaan
                        ,naam_pretpark
                        ,naam_land
                        ,topsnelheid
                        ,hoogte
                        ,datum
                        ,cijfer)
            VALUES      (NULL
                        ,:naam_achtbaan
                        ,:naam_pretpark
                        ,:naam_land
                        ,:topsnelheid
                        ,:hoogte
                        ,:datum
                        ,:cijfer);";
$statement = $pdo->prepare($sql);

$statement->bindValue(":naam_achtbaan", $_POST["naam_achtbaan"], PDO::PARAM_STR);
$statement->bindValue(":naam_pretpark", $_POST["naam_pretpark"], PDO::PARAM_STR);
$statement->bindValue(":naam_land", $_POST["naam_land"], PDO::PARAM_STR);
$statement->bindValue(":topsnelheid", $_POST["topsnelheid"], PDO::PARAM_STR);
$statement->bindValue(":hoogte", $_POST["hoogte"], PDO::PARAM_STR);
$statement->bindValue(":datum", $_POST["datum"], PDO::PARAM_STR);
$statement->bindValue(":cijfer", $_POST["cijfer"], PDO::PARAM_STR);

$statement->execute();

header("location: read.php");
