<?php

$login = $_POST['login'];
$mdp = $_POST['mdp'];

$loginAdmin = "admin";
$mdpAdmin = "admin";

if ($login === $loginAdmin && $mdp === $mdpAdmin){
    session_start();
    $_SESSION['connecte'] = true;
    header('Location: accueil.php');
}else{
    header('Location: index.php');
}

