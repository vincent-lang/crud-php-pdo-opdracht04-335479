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

$sql = "SELECT Id
            ,naam_achtbaan
            ,naam_pretpark
            ,naam_land
            ,topsnelheid
            ,hoogte
            ,datum
            ,cijfer
        FROM achtbaan
        ORDER BY Id ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->naam_achtbaan</td>
                <td>$info->naam_pretpark</td>
                <td>$info->naam_land</td>
                <td>$info->topsnelheid</td>
                <td>$info->hoogte</td>
                <td>$info->datum</td>
                <td>$info->cijfer</td>
                <td>
                    <a href='delete.php?id={$info->Id}'>
                        <img src='img/b_drop.png' alt='Drop'</img>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$info->Id}'>
                        <img src='img/b_edit.png' alt='Edit'</img>
                    </a>
                </td>
            </tr>";
}

?>


<h3>Tabel achtbaan</h3>
<a href="index.php"><button>nieuwe achtbaan</button></a>
<table border="1">
    <thead>
        <th>Id</th>
        <th>NaamAchtbaan</th>
        <th>NaamPretpark</th>
        <th>Land</th>
        <th>Topsnelheid</th>
        <th>Hoogte</th>
        <th>Datum</th>
        <th>Cijfer</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>