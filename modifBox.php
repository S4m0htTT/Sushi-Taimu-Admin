<?php
require 'function.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modif box</title>
</head>

<body>
    <a href="box.php">BACK</a>
    <br>
    <br>
    <form action="_modifBox.php" method="post">
        <?php
        require_once 'callAPI.php';
        $id = intval($_GET['id']);
        $data = array(
            "id" => $id
        );
        $wrapped_data = array($data);
        $json_result = json_encode($wrapped_data);

        $get_data = callAPI('GET', 'http://localhost:3000/box', $json_result);
        echo $get_data . "<br>";
        $data = json_decode($get_data, true);

        foreach ($data as $item) {
        ?>
            <input name="nom" type="text" value="<?= $item['nom'] ?>"><br>
            <input name="prix" type="number" value="<?= $item['prix'] ?>" step="0.01"><br>
            <input name="categorie" type="text" value="<?= $item['categorie'] ?>"><br>
            <input name="image" type="hidden" value="<?= $item['image'] ?>">
            <input name="id" type="hidden" value="<?= $id ?>">
            <p>Aliments :</p>
            <p onclick="addAl()">+</p>
            <p onclick="supprAl()">-</p>
            <div id="containerAllAl">
                <?php
                foreach ($item['aliments'] as $key => $aliment) {
                ?>
                    <div class="container_al">
                        <input type="hidden" oninput="verify()" name="aliments[<?= $key ?>][id]" value="<?= $aliment['id'] ?>">
                        <input name="aliments[<?= $key ?>][nom]" oninput="verify()" type="text" value="<?= $aliment['nom'] ?>">
                        <input name="aliments[<?= $key ?>][quantite]" type="number" value="<?= $aliment['quantity'] ?>">
                    </div>
                    <br>
                <?php
                }
                echo '<br>';
                echo '</div>';
                echo 'Saveurs : <br>';
                ?>

                <p onclick="addSav()">+</p>
                <p onclick="supprSav()">-</p>
                <div id="containerAllSav">
                    <?php
                    foreach ($item['saveurs'] as $key => $saveur) {
                    ?>
                        <div class="container_sav">
                            <input type="hidden" name="saveurs[<?= $key ?>][id]" value="<?= $saveur['id'] ?>">
                            <input oninput="verify()" name="saveurs[<?= $key ?>][nom]" type="text" value="<?= $saveur['nom'] ?>"><br>
                        </div>

                <?php
                    }
                }
                ?>
                </div>
                <input id="submit" type="submit" value="Soumettre">
    </form>
    <script src="js/modifBox.js?time=<?php require 'UID.php';
                                        echo UID(200) ?>"></script>
</body>

</html>