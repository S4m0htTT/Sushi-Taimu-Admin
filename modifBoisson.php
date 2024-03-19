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
    <title>Modif - Boisson</title>
</head>

<body>
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
            <input type="text" name="nom" id="nom" value="<?= $item['nom'] ?>">
            <input step="0.01" type="number" name="prix" id="prix" value="<?= $item['prix'] ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php
        }
        ?>
        <input type="submit" value="send">
    </form>
</body>

</html>