<?php
    session_start(); // Assurez-vous que cette ligne est en haut de votre fichier
    require '../includes/connexion_bdd/connexion_bdd.php';
    
    if (empty($_SESSION['username'])){
        header('Location: ../index.php');
        exit(); // Assurez-vous d'appeler exit() après une redirection
    };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backoffice.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>BackOffice</title>
</head>

<body>
    <section class="regroupement_office">
        <div class="regroupement_presentation_back">
            <h1>Bienvenue dans votre BackOffice</h1>
            <h2>Vous pouvez administrer ici les différentes partie du site PatteZen5</h2>
        </div>
        <div class="regroupement_page">
            <span class="regroupement_forma_presta">            
                <a class="button-36" href="view_formation.php">Les Formations</a>
                <a class="button-36" href="view_prestation.php">Les prestations</a>
            </span>
            <span class="regroupement_forma_presta"> 
                <a class="button-36" href="view_livre_dor.php">Le livre d'or</a>
                <a class="button-36" href="view_galerie.php">La galerie de photo</a>
            </span>
            <a class="button-36" href="update_details.php">Les informations</a>

            <a href="deconnection.php" class="btn btn-danger">Se déconnecter</a>
        </div>
    </section>

</body>

</html>