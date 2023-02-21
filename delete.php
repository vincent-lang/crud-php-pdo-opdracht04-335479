<?php

echo "Het id is: " . $_GET['id'] . "<br>";

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        
    } else {

    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "DELETE FROM achtbaan
        WHERE Id = :SQLId";

$statement = $pdo->prepare($sql);

$statement->bindValue(':SQLId', $_GET['id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "Succesvol verwijderd van de record met id {$_GET['id']}";
    header('Refresh:1;url=read.php');
} else {
    echo "Internal server error, record is niet verwijderd";
    header('Refresh:1,url=read.php');
}
