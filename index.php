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
    <section id="bg"></section>
    <section id="container_g">
        <nav>
            <img src="img/Logo_Sushi_Taimu.svg" alt="Logo Sushi Taimu">
        </nav>
        <h1>Connexion</h1>
        <form action="_verifCompte.php" method="post">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" class="input">
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" class="input">
            <input type="submit" value="Connexion">
        </form>
    </section>

</html>