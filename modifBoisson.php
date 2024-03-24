<?php
require 'function.php';
require_once 'callAPI.php';
$id = intval($_GET['id']);
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
    <title>Modif - Boisson</title>
</head>

<body>
    <section id="bg"></section>
    <section id="container_g">
        <?php require 'nav.html' ?>

        <div id="container-deco">
            <a id="back" href="boisson.php">Retour</a>
        </div>
        <form action="_modifBoisson.php" method="post">
            <?php
            $data = array(
                "id" => $id
            );
            $wrapped_data = array($data);
            $json_result = json_encode($wrapped_data);
            $get_data = callAPI('GET', 'http://localhost:3000/boissons', $json_result);
            $data = json_decode($get_data, true);
            foreach ($data as $item) {
            ?>
                <h1>Modification de la boisson : <?= $item['nom'] ?></h1>
                <h2>Information :</h2>
                <div class="infoG">
                    <label for="nom">Nom : </label>
                    <input type="text" name="nom" id="nom" value="<?= $item['nom'] ?>">
                </div>
                <div class="infoG">
                    <label for="prix">Prix : </label>
                    <input step="0.01" type="number" name="prix" id="prix" value="<?= $item['prix'] ?>">
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
            <?php
            }
            ?>
            <input type="submit" value="Modifier">
        </form>
    </section>
</body>

</html>