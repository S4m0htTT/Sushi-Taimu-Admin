<?php

require_once 'callAPI.php';

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$image = $_POST['file'];
$filename = pathinfo($image, PATHINFO_FILENAME);
$aliments = $_POST['aliments'];
$saveurs = $_POST['saveurs'];

$quantite = 0;
foreach ($aliments as $aliment){
    $quantite += intval($aliment['quantite']);
}

$box_array = array(
    "nom" => $nom,
    "prix" => floatval($prix),
    "categorie" => $categorie,
    "image" => $filename, 
    "pieces" => $quantite
);

$box_json = json_encode($box_array);
echo $box_json;
$post_data = callAPI('POST', 'http://localhost:3000/box', $box_json);
echo $post_data;

echo "<br>";

$get_data = callAPI('GET', 'http://localhost:3000/box', false);
$get_data = json_decode($get_data, true);
$json = null;
foreach ($get_data as $data){
    $json = $data;
}
$boxId = $json['id'];

foreach ($aliments as $aliment){
    echo 'POST';
    $aliment['quantite'] = intval($aliment['quantite']);
    $aliment['boxId'] = intval($boxId);

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
}

foreach ($saveurs as $saveur){
    echo "POST";
    $saveur['boxId'] = intval($boxId);
    $saveur_array = array(
        "nom" => $saveur['nom'],
        "boxId" => $saveur['boxId']
    );
    $saveur_json = json_encode($saveur_array);
    echo $saveur_json;
    echo "<br><br>";
    $put_data_sav = callAPI('POST', 'http://localhost:3000/box/saveurs/', $saveur_json);
    echo $put_data_sav;
}
header('Location: box.php');