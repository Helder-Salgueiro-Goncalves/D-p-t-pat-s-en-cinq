<?php 
require '../includes/connexion_bdd/connexion_bdd.php';

$query = $connexion->prepare("SELECT * FROM livre_dor;");
$query->execute();
$liste = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['suppression'])) {
    $formulaire = $_POST['suppression'];

    if (isset($formulaire['id'])) {
        try {
            $requete = $connexion->prepare('DELETE FROM livre_dor WHERE livre_id = :id');
            $requete->bindParam(':id', $formulaire['id'], PDO::PARAM_INT);
            $requete->execute();

            header('Location: view_livre_dor.php');
            exit();
        } catch (\Exception $exception) {
            var_dump($exception);
        }
    }
}

if (isset($_POST['toggle_visibility'])) {
    $formulaire = $_POST['toggle_visibility'];

    if (isset($formulaire['id'])) {
        try {
            // Toggle the visibility
            $requete = $connexion->prepare('UPDATE livre_dor SET livre_archive = NOT livre_archive WHERE livre_id = :id');
            $requete->bindParam(':id', $formulaire['id'], PDO::PARAM_INT);
            $requete->execute();

            header('Location: view_livre_dor.php');
            exit();
        } catch (\Exception $exception) {
            var_dump($exception);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="backoffice.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livre_dor</title>
    <style>
        .hidden-message {
            opacity: 0.5;
            background-color: #f8d7da;
        }
        .visible-message {
            background-color: #d4edda;
        }
    </style>
</head>
<body>
    <a style="margin-top: 50px; margin-bottom: 20px;" class="btn btn-danger" href="backoffice.php">Retour au menu principal</a>
    <table class="table" style="width: 70%">
        <thead>
            <tr class="table-primary">
                <th>Nom du contact</th>
                <th>Contenu du message</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste as $element) { ?>
            <tr class="<?= $element['livre_archive'] == 1 ? 'visible-message' : 'hidden-message' ?>">
                <td><?= htmlspecialchars($element['auteur_prenom'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($element['livre_contenu'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($element['auteur_note'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <form action="view_livre_dor.php" method="POST" style="display:inline;">
                        <input type="hidden" name="suppression[id]" value="<?= htmlspecialchars($element['livre_id'], ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <form action="view_livre_dor.php" method="POST" style="display:inline;">
                        <input type="hidden" name="toggle_visibility[id]" value="<?= htmlspecialchars($element['livre_id'], ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" class="btn btn-secondary">
                            <?= $element['livre_archive'] == 1 ? 'Masquer' : 'Afficher' ?>
                        </button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>