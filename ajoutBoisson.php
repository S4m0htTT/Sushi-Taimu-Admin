<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout - Boisson</title>
</head>

<body>
    <a href="boisson.php">Back</a>
    <form action="_ajoutBoisson.php" method="post">
        <input type="file" id="file" name="file" accept="image/png">
        <input type="text" id="nom" name="nom" placeholder="nom :">
        <input step="0.01" type="number" id="prix" name="prix" placeholder="prix :">
        <input type="submit">
    </form>
</body>

</html>