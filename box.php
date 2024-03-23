<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box - Sushi Taimu</title>
    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/table.css?time=<?php echo UID(200) ?>">
    <link rel="stylesheet" href="css/box.css?time=<?php echo UID(200) ?>">
</head>

<body>
    <?php
    require_once 'callAPI.php';
    $get_data = callAPI('GET', 'http://localhost:3000/box', false);
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
                <a id="add" href="ajoutBox.php">Ajouter une boxe</a>
            </div>
        </div>

        <table>
            <thead>
                <tr class="thead">
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
                        <th class="option">
                            <a href="modifBox.php?id=<?= $key['id'] ?>"><img src="icon/pen.svg" alt="modifier"></a>
                            <p onclick="popup()"><img src="icon/trash.svg" alt="supprimer"></p>
                        </th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <div id="bg2"></div>
    <div id="popup">
        <div>
            <div class="bgConfirm"></div>
            <div class="container-confirm">
                <p>Etes vous sur de vouloir supprimer cette boxe ?</p>
                <div class="containerBuConf">
                    <p onclick="annule()" class="annBu">Annuler</p>
                    <a href="_delBox.php?id=<?= $key['id'] ?>" class="confBu">Confirmer</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function popup(){
            const popup = document.getElementById('popup')
            bg = document.getElementById('bg2');
            popup.style.display = 'block';
            bg.style.display = 'block';
        }
        function annule(){
            const popup = document.getElementById('popup')
            bg = document.getElementById('bg2');
            popup.style.display = 'none';
            bg.style.display = 'none';
        }
    </script>
</body>

</html>