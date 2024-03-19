<?php
require_once 'callAPI.php';

$file = $_POST['file'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];

$filename = pathinfo($file, PATHINFO_FILENAME);

$boisson_array = array(
    "nom" => $nom,
    "prix" => floatval($prix),
    "image" => $filename
);

$boisson_json = json_encode($boisson_array);
echo $boisson_json;
$post_data = callAPI('POST', 'http://localhost:3000/boissons/', $boisson_json);
echo $post_data;

header('Location: boisson.php');