<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sushi Taimu</title>
    <link rel="stylesheet" href="css/connexion.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
</head>

<body>
    <form action="_verifCompte.php" method="post">
        <input type="text" name="login" id="login">
        <input type="password" name="mdp" id="mdp">
        <input type="submit" value="Connexion">
    </form>
</html>