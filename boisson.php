<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boisson - Sushi Taimu</title>
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
    $get_data = callAPI('GET', 'http://localhost:3000/boissons', false); 
    $data = json_decode($get_data, true);
    ?>
    <a href="accueil.php">Back</a>
    <a href="deconnexion.php">Déconnexion</a>

    <a href="ajoutBoisson.php">Ajouter Boisson</a>
    <table>
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key) {
            ?>
                <tr>
                    <th><?= $key['id'] ?></th>
                    <th><?= $key['nom'] ?></th>
                    <th><?= $key['prix'] ?></th>
                    <th>
                        <a href="modifBoisson.php?id=<?= $key['id'] ?>"><img src="icon/pen.svg" alt="modifier"></a>
                        <a href="_delBoisson.php?id=<?= $key['id'] ?>"><img src="icon/trash.svg" alt="supprimer"></a>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>