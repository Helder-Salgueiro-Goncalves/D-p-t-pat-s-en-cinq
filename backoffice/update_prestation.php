<?php
require '../includes/connexion_bdd/connexion_bdd.php';

$prestation = null; // Initialise $prestation à null

if (isset($_GET['prestation_id'])) {
    $prestation_id = $_GET['prestation_id'];

    $stmt = $connexion->prepare("SELECT * FROM prestation WHERE prestation_id = :prestation_id");
    $stmt->bindParam(':prestation_id', $prestation_id);
    $stmt->execute();
    $prestation = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_prestation = $_POST['prestation_libelle'];
    $contenu_prestation = $_POST['prestation_contenu'];
    $prix_prestation = $_POST['prestation_prix'];

    $stmt = $connexion->prepare("UPDATE prestation 
    SET prestation_libelle = :nom, prestation_contenu = :contenu, prestation_prix = :prix
    WHERE prestation_id = :prestation_id");
    $stmt->bindParam(':prestation_id', $prestation_id);
    $stmt->bindParam(':nom', $nom_prestation);
    $stmt->bindParam(':contenu', $contenu_prestation);
    $stmt->bindParam(':prix', $prix_prestation);

    if ($stmt->execute()) {
        $success_message = "La prestation a été modifiée avec succès."; // Message de succès si la mise à jour réussit
    } else {
        $error_message = "Erreur lors de la modification de la prestation."; // Message d'erreur en cas d'échec de la mise à jour
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
    <title>Modifier une prestation</title>
</head>

<body>
    <h1>Modifier une prestation :</h1>
    <form action="update_prestation.php?prestation_id=<?= $prestation['prestation_id'] ?? '' ?>" method="post">
        <label for="prestation_libelle" class="form-label">>Nom de la prestation :</label>
        <input class="form-control" type="text" name="prestation_libelle" value="<?= $prestation['prestation_libelle'] ?? '' ?>" required><br>

        <label for="prestation_contenu" class="form-label">>Contenu de la prestation:</label>
        <input class="form-control" type="text" name="prestation_contenu" value="<?= $prestation['prestation_contenu'] ?? '' ?>" required><br>

        <label for="prestation_prix" class="form-label">>Prix de la prestation :</label>
        <input class="form-control" type="text" name="prestation_prix" value="<?= $prestation['prestation_prix'] ?? '' ?>" required><br>

        <input class="btn btn-primary me-md-2" type="submit" value="Modifier la prestation">
    </form>

    <?php if (isset($success_message)) : ?>
        <p><?= $success_message ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>
    <br>
    <div class="button-container">
        <a href="view_prestation.php" class="btn btn-danger">Retour à la liste des prestation</a>
    </div>
</body>

</html>