<?php
require '../includes/connexion_bdd/connexion_bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $assistant_canin_nom = $_POST['assistant_canin_nom'];
    $assistant_canin_libelle = $_POST['assistant_canin_libelle'];

    $stmt = $connexion->prepare("INSERT INTO assistant_canin (assistant_canin_nom, assistant_canin_libelle) 
                                VALUES (:nom, :libelle)");
    $stmt->bindParam(':nom', $assistant_canin_nom);
    $stmt->bindParam(':libelle', $assistant_canin_libelle);

    if ($stmt->execute()) {
        $success_message = "L'assitant canin a été ajoutée avec succès."; 
    } else {
        $error_message = "Erreur lors de l'ajout de l'assistant canin.";
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
    <title>Ajouter un assistant canin</title>
</head>

<body>
    <h1>Ajouter un assistant canin :</h1>
    <form action="add_assistant_canin.php" method="post">
        <label for="assistant_libelle">Nom de l'assistant :</label>
        <input class="form-control"  type="text" name="assistant_canin_libelle" required><br>

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