<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boisson - Sushi Taimu</title>
    <link rel="icon" type="image/x-icon" href="img/Logo_Sushi_Taimu.svg">

    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/table.css?time=<?php echo UID(200) ?>">
    <link rel="stylesheet" href="css/boisson.css?time=<?php echo UID(200) ?>">
</head>

<body>
    <?php
    require_once 'callAPI.php';
    $get_data = callAPI('GET', 'http://localhost:3000/boissons', false);
    $data = json_decode($get_data, true);
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
                <a id="add" href="ajoutBoisson.php">Ajouter une boisson</a>
            </div>
        </div>
        <table>
            <thead>
                <tr class="thead">
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prix</th>
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
                        <th class="option">
                            <a href="modifBoisson.php?id=<?= $key['id'] ?>"><img src="icon/pen.svg" alt="modifier"></a>
                            <a href="_delBoisson.php?id=<?= $key['id'] ?>"><img src="icon/trash.svg" alt="supprimer"></a>
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