<?php 
 require '../includes/connexion_bdd/connexion_bdd.php';


 $query = $connexion->prepare("SELECT * FROM livre_dor;");
$query->execute();

$liste = $query->fetchAll();
if (isset($_POST['suppression'])) {
    $formulaire = $_POST['suppression'];

    if (isset($formulaire['id'])) {
        try {
            $requete = $connexion->prepare('DELETE FROM livre_dor WHERE livre_id = :id');
            $requete->bindParam(':id', $formulaire['id']);
            $requete->execute();

            header('Location: view_livre_dor.php');
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
</head>
<body>
<table class="table" style="width: 70%">
		<thead>
			<tr class="table-primary">
				<th>Nom du contact</th>
				<th>Contenu du message</th>
                <th>Note</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($liste as $element) { ?>
			<tr>
				<td><?= $element['auteur_prenom'] ?></td>
                <td><?= $element['livre_contenu'] ?></td>
				<td><?= $element['auteur_note'] ?></td>
                <td>
                    <form action="#" method="POST" name="suppression">
                        <input type="hidden" name="suppression[id]" value="<?= $element['livre_id']?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button></td>
                    <form>
                </td>
			</tr>
			<?php }?>
		</tbody>
</table>
<a style="margin-top: 50px;margin-bottom: 20px;" class="btn btn-danger" href= "backoffice.php">Retour</a>


    
</body>
</html>
