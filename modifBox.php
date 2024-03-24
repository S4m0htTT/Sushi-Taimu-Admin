<?php
require 'function.php';
require_once 'callAPI.php';
$id = intval($_GET['id']);
$data = array(
    "id" => $id
);
$wrapped_data = array($data);
$json_result = json_encode($wrapped_data);

$get_data = callAPI('GET', 'http://localhost:3000/box', $json_result);
$data = json_decode($get_data, true);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/Logo_Sushi_Taimu.svg">

    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/boxModif.css?time=<?php echo UID(200) ?>">
    <title>Modif box</title>
</head>

<body>
    <section id="bg"></section>
    <section id="container_g">
        <?php require 'nav.html' ?>

        <div id="container-deco">
            <a id="back" href="box.php">Retour</a>
        </div>
        <form action="_modifBox.php" method="post">
            <?php
            foreach ($data as $item) {
            ?>
                <h1>Modification de la box <?= $item['nom'] ?></h1>
                <h2>Information :</h2>
                <div class="infoG">
                    <label for="nom">Nom :</label>
                    <input oninput="verify()" name="nom" type="text" value="<?= $item['nom'] ?>">
                </div>
                <div class="infoG">
                    <label for="prix">Prix :</label>
                    <input oninput="verify()" name="prix" type="number" value="<?= $item['prix'] ?>" step="0.01">
                </div>
                <div class="infoG">
                    <label for="categorie">Catégorie :</label>
                    <input oninput="verify()" name="categorie" type="text" value="<?= $item['categorie'] ?>"><br>
                </div>

                <input name="image" type="hidden" value="<?= $item['image'] ?>">
                <input name="id" type="hidden" value="<?= $id ?>">

                <h2>Aliments :</h2>
                <div id="containerAllAl">
                    <?php
                    foreach ($item['aliments'] as $key => $aliment) {
                    ?>
                        <div class="container_al">
                            <input type="hidden" oninput="verify()" name="aliments[<?= $key ?>][id]" value="<?= $aliment['id'] ?>">
                            <label for="aliments[<?= $key ?>][nom]">Nom :</label>
                            <input name="aliments[<?= $key ?>][nom]" oninput="verify()" type="text" value="<?= $aliment['nom'] ?>">
                            <label for="aliments[<?= $key ?>][quantite]">Quantité :</label>
                            <input oninput="verify()" name="aliments[<?= $key ?>][quantite]" type="number" value="<?= $aliment['quantity'] ?>">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="optionAj">
                    <p onclick="addAl()">+</p>
                    <p onclick="supprAl()">-</p>
                </div>
                <h2>Saveurs :</h2>

                <div id="containerAllSav">
                    <?php
                    foreach ($item['saveurs'] as $key => $saveur) {
                    ?>
                        <div class="container_sav">
                            <input type="hidden" name="saveurs[<?= $key ?>][id]" value="<?= $saveur['id'] ?>">
                            <label for="saveurs[<?= $key ?>][nom]">Nom : </label>
                            <input oninput="verify()" name="saveurs[<?= $key ?>][nom]" type="text" value="<?= $saveur['nom'] ?>"><br>
                        </div>

                <?php
                    }
                }
                ?>
                </div>
                <div class="optionAj">
                    <p onclick="addSav()">+</p>
                    <p onclick="supprSav()">-</p>
                </div>
                <input id="submit" type="submit" value="Modifier">
        </form>
    </section>
    <script src="js/modifBox.js?time=<?php echo UID(200) ?>"></script>
</body>

</html>