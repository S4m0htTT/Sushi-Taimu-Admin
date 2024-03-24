<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/Logo_Sushi_Taimu.svg">
    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/boxModif.css?time=<?php echo UID(200) ?>">
    <title>Ajout Box</title>
</head>

<body>
    <section id="bg"></section>
    <section id="container_g">
        <?php require 'nav.html' ?>

        <div id="container-deco">
            <a id="back" href="box.php">Retour</a>
        </div>
        <form action="_ajoutBox.php" method="post">
            <h1>Ajouter une box</h1>
            <h2>Information :</h2>
            <div id="divFile">
                <label for="file" class="input-file">
                    Selectionner un fichier
                    <input oninput="verify()" type="file" id="file" name="file" accept="image/png">
                </label>
                <p id="fileName" class="file-name"></p>
            </div>
            <div class="infoG">
                <label for="nom">Nom :</label>

                <input oninput="verify()" type="text" id="nom" name="nom" placeholder="ex : box sushi">
            </div>
            <div class="infoG">
                <label for="prix">Prix :</label>

                <input oninput="verify()" step="0.01" type="number" id="prix" name="prix" placeholder="ex : 12,99">
            </div>
            <div class="infoG">
                <label for="categorie">Catégorie :</label>
                <input oninput="verify()" type="text" id="categorie" name="categorie" placeholder="ex : Maki">
            </div>
            <h2>Aliments</h2>
            <div id="containerAllAl">
                <div class="container_al">
                    <input oninput="verify()" type="text" name="aliments[0][nom]" placeholder="ex : sushi saumon">
                    <input oninput="verify()" type="number" name="aliments[0][quantite]" placeholder="ex : 12">
                </div>
            </div>
            <div class="optionAj">
                <p onclick="addAl()">+</p>
                <p onclick="supprAl()">-</p>
            </div>
            <h2>Saveurs</h2>
            <div id="containerAllSav">
                <div class="container_sav">
                    <input oninput="verify()" type="text" name="saveurs[0][nom]" placeholder="ex : saumon">
                </div>
            </div>
            <div class="optionAj">
                <p onclick="addSav()">+</p>
                <p onclick="supprSav()">-</p>
            </div>
            <input id="submit" type="submit" value="Ajouter">
        </form>
    </section>
    <script src="js/ajoutBox.js"></script>
    <script>
        const fileInput = document.getElementById('file');
        fileInput.addEventListener('change', function() {
            updateFileName(this);
        });

        function updateFileName(input) {
            const fileNameElement = document.getElementById('fileName');
            if (input.files.length > 0) {
                const fileName = input.files[0].name;
                fileNameElement.textContent = "Fichier sélectionné : " + fileName;
            } else {
                fileNameElement.textContent = "";
            }
        }
    </script>
</body>

</html>