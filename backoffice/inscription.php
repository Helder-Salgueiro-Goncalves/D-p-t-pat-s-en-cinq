<?php

 require '../includes/connexion_bdd/connexion_bdd.php';


$mot_de_passe = password_hash($_POST['utilisateur_mdp'], PASSWORD_ARGON2I);

$erreurs = [];
if (empty($_POST) === false) {

	// Vérification des données saisies
	if (empty($_POST['nom'])) {
		$erreurs['nom'] = 'Veuillez saisir votre nom :';
	}
    if (empty($_POST['mdp'])) {
		$erreurs['mdp'] = 'Veuillez saisisr un mot de passe :';
	}

  if (empty($erreurs)) {
    try {
      $requeteInsertion = $connexion->prepare('INSERT INTO utilisateur (utilisateur_username, utilisateur_mdp) VALUES (:utilisateur_username, :utilisateur_mdp)');
      $requeteInsertion->bindParam(':utilisateur_username', $_POST['nom']);
      $requeteInsertion->bindParam(':utilisateur_mdp', $mot_de_passe);

      $requeteInsertion->execute();

      echo 'Votre demande a bien été prise en compte.';
    } catch (\Exception $exception) {
      echo 'Erreur lors de l\'ajout de la demande de contact.';
      // Debug de l'erreur :
      var_dump($exception->getMessage());
    }
  }
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>poc_gestion_contact</title>
</head>
<body>
    

	<form action="#" method="POST">
        <label>Nom d'utilisateur : </label>
        <input type="text" name="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : null; ?>">
        <br><br>

        <label>mot de passe : </label>
        <input type="password" name="mdp" value="<?= isset($_POST['mdp']) ? $_POST['mdp'] : null; ?>">
        <br><br>

		
			<br><input type="submit" name="validation">
		</div>
	</form>
</body>
</html>