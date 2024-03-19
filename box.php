<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST - API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 75%;
            border-collapse: collapse;
            border: 2px solid #ddd;
            margin: 0 auto;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) th {
            background-color: #f5f5f5;
        }

        tbody tr:hover th{
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>
    <?php
    require_once 'callAPI.php';
    $get_data = callAPI('GET', 'http://localhost:3000/box', false); 
    $data = json_decode($get_data, true);
    ?>
    <a href="accueil.php">Back</a>
    <a href="ajoutBox.php">Ajouter Box</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Pièces</th>
                <th>Catégorie</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key) {
            ?>
                <tr>
                    <th><?= $key['id'] ?></th>
                    <th><?= $key['nom'] ?></th>
                    <th><?= $key['prix'] ?></th>
                    <th><?= $key['pieces'] ?></th>
                    <th><?= $key['categorie'] ?></th>
                    <th>
                        <a href="modifBox.php?id=<?= $key['id'] ?>"><img src="icon/pen.svg" alt="modifier"></a>
                        <a href="_delBox.php?id=<?= $key['id'] ?>"><img src="icon/trash.svg" alt="supprimer"></a>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>