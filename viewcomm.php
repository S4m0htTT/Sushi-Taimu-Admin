<?php
require_once 'callAPI.php';
require 'function.php';

$id = intval($_GET['id']);

$comm_array = array(
    "id" => $id,
);
$comm_array = array($comm_array);
$comm_json = json_encode($comm_array);
$get_data = callAPI('GET', 'http://localhost:3000/commandes/', $comm_json);
$get_data = json_decode($get_data, true);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/table.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <title>Commande - Sushi Taimu</title>
</head>

<body>
    <a href="commande.php">Back</a>
    <a href="deconnexion.php">Déconnexion</a>
    <h1>Contenu de la commande</h1>
    <h2>Box : </h2>
    <table>
        <thead>
            <tr id="th">
                <th>ID</th>
                <th>Nom</th>
                <th>Pièces</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($get_data as $item) {
                $box = $item['commande']['box'];
                foreach ($box as $box_item) {
                    if ($box_item != null) {
            ?>
                        <tr class="ligne">
                            <th><?= $box_item['id'] ?></th>
                            <th><?= $box_item['nom'] ?></th>
                            <th><?= $box_item['pieces'] ?></th>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <h2>Boisson :</h2>
    <table>
        <thead>
            <tr id="th">
                <th>ID</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($get_data as $item) {
                $box = $item['commande']['boisson'];
                foreach ($box as $box_item) {
            ?>
                    <tr class="ligne">
                        <th><?= $box_item['id'] ?></th>
                        <th><?= $box_item['nom'] ?></th>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>