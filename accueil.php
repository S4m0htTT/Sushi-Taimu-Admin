<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/Logo_Sushi_Taimu.svg">

    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/accueil.css?time=<?php echo UID(200) ?>">
</head>

<body>
    <section id="bg"></section>
    <section id="container_g">
        <?php require 'nav.html' ?>
        <div id="container-deco">
            <a id="deco" href="deconnexion.php">Déconnexion</a>
        </div>
        <div id="choix">
            <a href="commande.php">
                <div>
                    <img src="icon/commande.svg" alt="Commande">
                    <p>Commandes</p>
                </div>
            </a>
            <a href="box.php">
                <div>
                    <img id="box" src="icon/box.svg" alt="Box">
                    <p>Gestion des boxes</p>
                </div>
            </a>
            <a href="boisson.php">
                <div>
                    <img id="boisson" src="icon/boisson.svg" alt="boisson">
                    <p>Gestion des boissons</p>
                </div>
            </a>
        </div>
    </section>
</body>

</html>