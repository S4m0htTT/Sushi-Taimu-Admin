<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/Logo_Sushi_Taimu.svg">

    <link rel="stylesheet" href="css/style.css?time=<?php require 'UID.php';
                                                    echo UID(200) ?>">
    <link rel="stylesheet" href="css/boxModif.css?time=<?php echo UID(200) ?>">
    <title>Ajout - Boisson</title>
</head>

<body>
    <section id="bg"></section>
    <section id="container_g">
        <?php require 'nav.html' ?>

        <div id="container-deco">
            <a id="back" href="boisson.php">Retour</a>
        </div>
        <form action="_ajoutBoisson.php" method="post">
            <h1>Ajouter une boisson</h1>
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
                <input type="text" id="nom" name="nom" placeholder="ex : eau">
            </div>
            <div class="infoG">
                <label for="prix">Prix :</label>
                <input step="0.01" type="number" id="prix" name="prix" placeholder="ex : 12,99">
            </div>
            <input type="submit" value="Ajouter">
        </form>
    </section>
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