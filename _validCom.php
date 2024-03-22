<?php
require_once 'callAPI.php';

$id = $_GET['id'];
echo $id;

$data_statut = array(
    "statut" => 1
);

$data_json = json_encode($data_statut);
echo $data_json;

$getCom = callAPI('PUT', 'http://localhost:3000/commandes/'.$id, $data_json);
echo $getCom;

header('Location: commande.php');