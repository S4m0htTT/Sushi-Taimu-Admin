<?php
require 'function.php';
require_once 'callAPI.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/Logo_Sushi_Taimu.svg">

    <title>Commandes - Sushi Taimu</title>
    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/table.css?time=<?php echo UID(200) ?>">
    <link rel="stylesheet" href="css/commande.css?time=<?php echo UID(200) ?>">
</head>

<body>
    <?php
    $get_com = callAPI('GET', 'http://localhost:3000/commandes', false);
    $get_com = json_decode($get_com, true);
    ?>
    <section id="bg"></section>
    <section id="container_g">
        <?php require 'nav.html' ?>
        <div id="container-deco">
            <div>
                <a id="deco" href="deconnexion.php">Déconnexion</a>
            </div>
            <div>
                <a id="back" href="accueil.php">Retour</a>
            </div>
        </div>
        <table>
            <thead>
                <tr class="thead">
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
                            <a class="view" href="viewcomm.php?id=<?= $com['id'] ?>">Voir la commade ></a>
                        </th>
                        <th>
                            <?php
                            if ($com['statut'] == 0) {
                            ?>
                                <a class="view" href="_validCom.php?id=<?= $com['id'] ?>">Valider la commande ></a>
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
    </section>
</body>

</html>