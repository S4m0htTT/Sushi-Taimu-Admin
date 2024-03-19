<?php
require_once 'callAPI.php';

$id = $_GET['id'];
echo $id;
$getCom = callAPI('GET', 'http://localhost:3000/commandes/'.$id, false);
echo $getCom;