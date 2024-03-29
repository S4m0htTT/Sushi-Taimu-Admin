<?php

require_once 'callAPI.php';

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$image = $_POST['image'];
$id = $_POST['id'];
$aliments = $_POST['aliments'];
$saveurs = $_POST['saveurs'];

echo "Nom: $nom <br>";
echo "Prix: $prix <br>";
echo "Catégorie: $categorie <br>";
echo "Image: $image <br>";
echo "Id: $id <br>";

echo "<br><br>";

$quantity = 0;
$aliments = $_POST['aliments'];
foreach ($aliments as $aliment) {
    if ($aliment['id'] == 'new') {
        echo 'POST';
        $aliment['quantite'] = intval($aliment['quantite']);
        $aliment['boxId'] = intval($id);
        $quantity += intval($aliment['quantite']);

        $aliment_array = array(
            "nom" => $aliment['nom'],
            "quantite" => $aliment['quantite'],
            "boxId" => $aliment['boxId']
        );

        $aliment_json = json_encode($aliment_array);
        echo $aliment_json;
        echo "<br><br>";
        $put_data_al = callAPI('POST', 'http://localhost:3000/box/aliments/', $aliment_json);
        echo $put_data_al;
    } else {
        echo 'PUT';
        $aliment['quantite'] = intval($aliment['quantite']);
        $aliment['boxId'] = intval($id);
        $quantity += intval($aliment['quantite']);
        $aliment_json = json_encode($aliment);
        echo $aliment_json;
        echo "<br><br>";
        $put_data_al = callAPI('PUT', 'http://localhost:3000/box/aliments/'.intval($id), $aliment_json);
        echo $put_data_al;
    }
}


echo "<br>";
echo "Quantity : $quantity";
echo "<br><br>";

// mise en place du tableau de json pour la mise a jour des aliments les nom ont été inversé
$saveurs = $_POST['saveurs'];
foreach ($saveurs as $saveur) {

    if($saveur['id']=='new'){
        echo "POST";
        $saveur['boxId'] = intval($id);
        $saveur_array = array(
            "nom" => $saveur['nom'],
            "boxId" => $saveur['boxId']
        );
        $saveur_json = json_encode($saveur_array);
        echo $saveur_json;
        echo "<br><br>";
        $put_data_sav = callAPI('POST', 'http://localhost:3000/box/saveurs/', $saveur_json);
        echo $put_data_sav;
    }else{
        echo "PUT";
        $saveur['boxId'] = intval($id);
        $saveur_json = json_encode($saveur);
        echo $saveur_json;
        echo "<br><br>";
        $put_data_sav = callAPI('PUT', 'http://localhost:3000/box/saveurs/'.intval($id), $saveur_json);
        echo $put_data_sav;
    }
}


$info = array(
    "nom" => $nom,
    "pieces" => $quantity,
    "prix" => floatval($prix),
    "image" => $image ,
    "categorie" => $categorie
);
$info_box = json_encode($info);

$put_data_box = callAPI('PUT', 'http://localhost:3000/box/' . intval($id), $info_box);
echo $put_data_box;

header('Location: box.php');