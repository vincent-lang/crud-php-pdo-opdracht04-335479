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
            ,blue
            ,pink
            ,purple
            ,red
            ,tel
            ,email
            ,datum
            ,nagelbijt
            ,luxemanicure
            ,nagelreparatie
        FROM Afspraak
        ORDER BY Id ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->blue</td>
                <td>$info->pink</td>
                <td>$info->purple</td>
                <td>$info->red</td>
                <td>$info->tel</td>
                <td>$info->email</td>
                <td>$info->datum</td>
                <td>$info->nagelbijt</td>
                <td>$info->luxemanicure</td>
                <td>$info->nagelreparatie</td>
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
<a href="index.php"><button>Nieuwe afspraak</button></a>
<table border="1">
    <thead>
        <th>Id</th>
        <th>color1</th>
        <th>color2</th>
        <th>color3</th>
        <th>color4</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Datum</th>
        <th>Nagelbijt</th>
        <th>Luxemanicure</th>
        <th>Nagelreparatie</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>