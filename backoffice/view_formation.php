<?php 
 require '../includes/connexion_bdd/connexion_bdd.php';

 
 $nombre = 0;

$query = $connexion->prepare("SELECT * FROM formation ");
$query->execute();

$liste = $query->fetchAll();
if (isset($_POST['suppression'])) {
    $formulaire = $_POST['suppression'];

    if (isset($formulaire['id'])) {
        try {
            $requete = $connexion->prepare('DELETE FROM formation WHERE formation_id = :id');
            $requete->bindParam(':id', $formulaire['id']);
            $requete->execute();

            header('Location: view_formation.php');
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
    <title>Formation</title>
</head>
<body>
    <a style="margin-top: 50px;margin-bottom: 20px;" class="btn btn-danger" href= "backoffice.php">Retour au menu principal</a>
    <a style="margin-top: 50px;margin-bottom: 20px;" href="add_formation.php " class="btn btn-primary me-md-2">Ajouter une formation</a>

    <table class="table" style="width: 70%">
        <thead>
            <tr class="table-primary">
                <th>Nom de la formation </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($liste as $element) { ?>
            <tr>
                <td><?= $element['formation_libelle'] ?></td>
                <td><a href="update_formation.php?id=<?= $element['formation_id'] ?>">Modifier</></td>
                <td>
                    <form action="#" method="POST" name="suppression">
                        <input type="hidden" name="suppression[id]" value="<?= $element['formation_id']?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button></td>
                    </form>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
</body>
</html>
