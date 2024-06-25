<?php
require '../includes/connexion_bdd/connexion_bdd.php';


$nombre = 0;

$query = $connexion->prepare("SELECT * FROM prestation ");
$query->execute();

$liste = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['suppression'])) {
    $formulaire = $_POST['suppression'];

    if (isset($formulaire['id'])) {
        try {
            $requete = $connexion->prepare('DELETE FROM prestation WHERE prestation_id = :id');
            $requete->bindParam(':id', $formulaire['id'], PDO::PARAM_INT);
            $requete->execute();

            header('Location: view_prestation.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backoffice.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Voir les prestations - backoffice</title>
</head>

<body>
    <a style="margin-top: 50px;margin-bottom: 20px;" class="btn btn-danger" href= "backoffice.php">Retour au menu principal</a>
	<a style="margin-top: 50px;margin-bottom: 20px;" class="btn btn-primary me-md-2" href="add_prestation.php">Ajouter une prestation</a>
    <table class="table" style="width: 70%">
        <thead>
            <tr class="table-primary">
                <th>Nom de la prestation</th>
                <th>Description de la prestation</th>
                <th>Prix de la prestation</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste as $element) { ?>
                <tr>
                <td><?= htmlspecialchars($element['prestation_libelle'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($element['prestation_contenu'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($element['prestation_prix'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><a href="update_prestation.php?prestation_id=<?= htmlspecialchars($element['prestation_id'], ENT_QUOTES, 'UTF-8') ?>">Modifier</a></td>
                    <td>
                    <form action="view_prestation.php" method="POST">
                        <input type="hidden" name="suppression[id]" value="<?= htmlspecialchars($element['prestation_id'], ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    </td>

                    <form>
                </tr>
            <?php } ?>
        </tbody>
    </table>


</body>

</html>