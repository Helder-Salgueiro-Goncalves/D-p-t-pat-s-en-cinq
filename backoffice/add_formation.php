<?php
require '../includes/connexion_bdd/connexion_bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_formation = $_POST['formation_libelle'];

    $stmt = $connexion->prepare("INSERT INTO formation (formation_libelle) 
                                VALUES (:nom)");
    $stmt->bindParam(':nom', $nom_formation);

    if ($stmt->execute()) {
        $success_message = "La formation a été ajoutée avec succès."; 
    } else {
        $error_message = "Erreur lors de l'ajout de la formation.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backoffice.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter une formation</title>
</head>

<body>
    <h1>Ajouter une formation :</h1>
    <form action="add_formation.php" method="post">
        <label for="formation_libelle">Nom de la formation :</label>
        <input class="form-control" type="text" name="formation_libelle" required><br>

        <input class="btn btn-primary me-md-2" type="submit" value="Ajouter la formation">
    </form>

    <?php if (isset($success_message)) : ?>
        <p><?= $success_message ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>
    <br>
    <div class="button-container">
       <a href="view_formation.php" class="btn btn-danger">Retour à la liste des formations</a>
    </div>
</body>

</html>