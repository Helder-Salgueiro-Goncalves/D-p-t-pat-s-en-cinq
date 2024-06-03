<?php
require '../includes/connexion_bdd/connexion_bdd.php';

$details = null; // Initialise $prestation à null

if (isset($_GET['a_propos_id'])) {
    $a_propos_id_id = $_GET['a_propos_id'];

    $stmt = $connexion->prepare("SELECT * FROM a_propos WHERE a_propos_id = :a_propos_id");
    $stmt->bindParam(':a_propos_id', $details_id);
    $stmt->execute();
    $a_propos = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $profil = $_POST['a_propos_profil'];
    $histoire = $_POST['a_propos_histoire'];
    $profession = $_POST['a_propos_profession'];

    $stmt = $connexion->prepare("UPDATE a_propos 
    SET a_propos_profil = :profil, a_propos_histoire = :histoire, a_propos_profession = :profession
    WHERE a_propos_id = :a_propos_id");
    $stmt->bindParam(':a_propos_id', $a_propos_id);
    $stmt->bindParam(':profil', $profil);
    $stmt->bindParam(':histoire', $histoire);
    $stmt->bindParam(':profession', $profession);

    if ($stmt->execute()) {
        $success_message = "Les informations ont été modifiée avec succès."; // Message de succès si la mise à jour réussit
    } else {
        $error_message = "Erreur lors de la modification des informations."; // Message d'erreur en cas d'échec de la mise à jour
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
    <title>Modifier les informations</title>
</head>

<body>
    <h1>Modifier les informations :</h1>
    <form action="update_details.php?a_propos_id=<?= $a_propos['a_propos_id'] ?? '' ?>" method="post">
        <label for="a_propos_profil" class="form-label">Section "Qui suis-je ?" :</label>
        <input class="form-control" type="text" name="a_propos_profil" value="<?= $a_propos['a_propos_profil'] ?? '' ?>" required><br>

        <label for="a_propos_profession" class="form-label">Section "Ce que je fais ?" :</label>
        <input class="form-control" type="text" name="a_propos_profession" value="<?= $a_propos['a_propos_profession'] ?? '' ?>" required><br>

        <label for="a_propos_histoire" class="form-label">Section "Notre histoire" :</label>
        <input class="form-control" type="text" name="a_propos_histoire" value="<?= $a_propos['a_propos_histoire'] ?? '' ?>" required><br>

        <input class="btn btn-primary me-md-2" type="submit" value="Modifier les informations">
    </form>

    <?php if (isset($success_message)) : ?>
        <p><?= $success_message ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>
    <br>
    <div class="button-container">
        <a href="backoffice.php" class="btn btn-danger">Retour au menu principal</a>
    </div>
</body>

</html>