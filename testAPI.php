<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST API</title>
</head>

<body>
    <a href="index.php">BACK</a>
    <?php
    require_once 'callAPI.php';

    //////////////// methode GET ////////////////////////////////////////////////////////////////////////////////

    // $data = array(
    //     "id" => 2
    // );
    // $data_encoded = $data ? json_encode($data) : false;

    $data = array(
        "id" => 2
    );
    $wrapped_data = array($data);
    $json_result = json_encode($wrapped_data);

    $get_data = callAPI('GET', 'http://localhost:3000/box', $json_result);
    // Affichage du résultat



    // echo "<br/>";
    ////////////////////////////////////////////////

    //////////////// methode POST pour une box ////////////////////////////////////////////////////////////////
    // $data_array =  array(
    //     "id" => 14,
    //     "nom" => "Tasty Blend",
    //     "pieces" => 12,
    //     "prix" => 12.50,
    //     "categorie" => "Maki",
    //     "image" => "tasty-blend"
    // );
    // $data_array = json_encode($data_array);
    // $get_data2 = callAPI('POST', 'http://localhost:3000/box', $data_array);
    // echo $get_data2;

    //////////////// création de la saveur de la box ////////////////
    // $data_array_saveur = array(
    //     "nom" => "saumon",
    //     "boxId" => 14
    // );
    // $data_array_saveur = json_encode($data_array_saveur);
    // $get_data3 = callAPI('POST', 'http://localhost:3000/box/saveurs', $data_array_saveur);
    // echo $get_data3;

    //////////////// création de l'aliment ////////////////
    // $data_array_aliments = array(
    //         "nom" => "California Saumon Avocat",
    //         "quantite" => 3,
    //         "boxId" => 14
    // );
    // $data_array_aliments = json_encode($data_array_aliments);
    // $get_data4 = callAPI('POST', 'http://localhost:3000/box/aliments', $data_array_aliments);
    // echo $get_data4;
    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //////////////// methode DELETE ////////////////////////////////////////////////////////////////////////////////
    // $get_data4 = callAPI('DELETE', 'http://localhost:3000/box/14', false);
    // echo $get_data4;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //////////////// methode PUT ////////////////////////////////////////////////////////////////////////////////
    // $data = array(
    //     "nom" => "California jerome Avocat",
    //     "pieces" => 9,
    //     "prix" => 9.99,
    //     "image" => "tasty-blend",
    //     "categorie" => "jerome"
    // );
    // $data = json_encode($data);
    // $put_data = callAPI('PUT', 'http://localhost:3000/box/14', $data);
    // echo $put_data;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ?>
</body>

</html>