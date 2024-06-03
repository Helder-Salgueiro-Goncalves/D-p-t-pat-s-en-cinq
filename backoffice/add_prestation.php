<?php
require '../includes/connexion_bdd/connexion_bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_prestation = $_POST['prestation_libelle'];
    $contenu_prestation = $_POST['prestation_contenu'];
    $prix_prestation = $_POST['prestation_prix'];

    $stmt = $connexion->prepare("INSERT INTO prestation (prestation_libelle, prestation_contenu, prestation_prix) 
                                VALUES (:nom, :contenu, :prix)");
    $stmt->bindParam(':nom', $nom_prestation);
    $stmt->bindParam(':contenu', $contenu_prestation);
    $stmt->bindParam(':prix', $prix_prestation);

    if ($stmt->execute()) {
        $success_message = "La prestation a été ajoutée avec succès."; 
    } else {
        $error_message = "Erreur lors de l'ajout de la prestation.";
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
    <title>Ajouter une prestation</title>
</head>

<body>
    <h1>Ajouter une prestation :</h1>
    <form action="add_prestation.php" method="post">
        <label for="prestation_libelle">Nom de la prestation :</label>
        <input class="form-control"  type="text" name="prestation_libelle" required><br>

        <label for="prestation_contenu">Contenu de la prestation:</label>
        <input class="form-control" type="text" name="prestation_contenu" required><br>

        <label for="prestation_prix">Prix de la prestation :</label>
        <input class="form-control" type="text" name="prestation_prix" required><br>

        <input class="btn btn-primary me-md-2" type="submit" value="Ajouter la prestation">
    </form>

    <?php if (isset($success_message)) : ?>
        <p><?= $success_message ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>
    <br>
    <div class="button-container">
       <a href="view_prestation.php" class="btn btn-danger">Retour à la liste des prestations</a>
    </div>
</body>

</html>