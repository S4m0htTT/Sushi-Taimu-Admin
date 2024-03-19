<?php
require_once 'callAPI.php';
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$id = $_POST['id'];

$boisson_array = array(
    "nom" => $nom,
    "prix" => $prix
);

$boisson_json = json_encode($boisson_array);
echo $boisson_json;

$put_data_al = callAPI('PUT', 'http://localhost:3000/boissons/'.intval($id), $boisson_json);
echo $put_data_al;

header('Location: boisson.php');