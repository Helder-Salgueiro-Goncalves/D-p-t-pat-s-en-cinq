<?php
require '../includes/connexion_bdd/connexion_bdd.php';

$formation = null;

if (isset($_GET['formation_id'])) {
    $formation_id = $_GET['formation_id'];

    $stmt = $connexion->prepare("SELECT * FROM formation WHERE formation_id = :formation_id");
    $stmt->bindParam(':formation_id', $formation_id);
    $stmt->execute();
    $formation = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_formation = $_POST['formation_libelle'];


    $stmt = $connexion->prepare("UPDATE formation 
    SET formation_libelle = :nom
    WHERE formation_id = :formation_id");
    $stmt->bindParam(':formation_id', $formation_id);
    $stmt->bindParam(':nom', $nom_formation);
    var_dump($stmt);

    if ($stmt->execute()) {
        $success_message = "La formation a été modifiée avec succès."; // Message de succès si la mise à jour réussit
    } else {
        $error_message = "Erreur lors de la modification de la formation."; // Message d'erreur en cas d'échec de la mise à jour
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
    <title>Modifier une formation</title>
</head>

<body>
    <h1>Modifier une formation :</h1>
    <form action="update_formation.php?formation_id=<?= $formation['formation_id'] ?? '' ?>" method="post">
        <label for="formation_libelle" class="form-label">Nom de la formation :</label>
        <input class="form-control" type="text" name="formation_libelle" value="<?= $formation['formation_libelle'] ?? '' ?>" required><br>

        <input class="btn btn-primary me-md-2" type="submit" value="Modifier la formation">
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