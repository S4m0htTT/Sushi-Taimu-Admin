<?php
require 'function.php';
require_once 'callAPI.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes - Sushi Taimu</title>
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

        th p {
            margin: 0;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) th {
            background-color: #f5f5f5;
        }

        tbody tr:hover th {
            background-color: #e0e0e0;
        }
    </style>
</head>

<body>
    <?php
    $get_com = callAPI('GET', 'http://localhost:3000/commandes', false);
    // echo "<pre>";
    // echo $get_com;
    // echo "</pre>";
    $get_com = json_decode($get_com, true);
    ?>
    <a href="accueil.php">Back</a>
    <a href="deconnexion.php">Déconnexion</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Prix</th>
                <th>statut</th>
                <th>Détail</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($get_com as $item) {
                $com = $item['commande'];
                $date = new DateTime($com['date']);
                $date = $date->format('Y-m-d H:i:s');
            ?>
                <tr>
                    <th><?= $com['id'] ?></th>
                    <th><?= $date ?></th>
                    <th><?= $com['prix'] ?></th>
                    <th><?= $com['statut'] ?></th>
                    <th>
                        <a href="viewcomm.php?id=<?= $com['id'] ?>">Voir la commade</a>
                    </th>
                    <th>
                        <?php
                        if ($com['statut'] == 0) {
                        ?>
                            <a href="_validCom.php?id=<?= $com['id'] ?>">Valider la commande</a>
                        <?php
                        } else {
                        ?>
                            <p>Validé</p>
                        <?php
                        }
                        ?>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>