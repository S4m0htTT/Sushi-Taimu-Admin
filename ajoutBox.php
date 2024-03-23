<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Box</title>
</head>

<body>
    <a href="box.php">Back</a>
    <form action="_ajoutBox.php" method="post">
        <input oninput="verify()" type="file" id="file" name="file" accept="image/png">
        <input oninput="verify()" type="text" id="nom" name="nom" placeholder="nom :">
        <input oninput="verify()" step="0.01" type="number" id="prix" name="prix" placeholder="prix :">
        <input oninput="verify()" type="text" id="categorie" name="categorie" placeholder="categorie :">
        <p>Aliments</p>
        <p onclick="addAl()">+</p>
        <p onclick="supprAl()">-</p>
        <div id="containerAllAl">
            <div class="container_al">
                <input oninput="verify()" type="text" name="aliments[0][nom]" placeholder="nom al :">
                <input oninput="verify()" type="number" name="aliments[0][quantite]" placeholder="quantite :">
            </div>
        </div>
        <p>Saveurs</p>
        <p onclick="addSav()">+</p>
        <p onclick="supprSav()">-</p>
        <div id="containerAllSav">
            <div class="container_sav">
                <input oninput="verify()" type="text" name="saveurs[0][nom]" placeholder="nom sav :">
            </div>
        </div>
        <input id="submit" type="submit" value="send">
    </form>
    <script src="js/ajoutBox.js"></script>
</body>

</html>