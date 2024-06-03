<?php

session_start();

?>

<?php
 require '../includes/connexion_bdd/connexion_bdd.php';

	// Etape 1 : Initialisation du tableau d'erreur
	$erreurs = [];

	// Etape 2 : vérification que les données ont été saisies.

	if (isset($_POST['username']) && isset($_POST['password'])) {

		// Etape 4 : Récupération d'un utilisateur dans la base avec le même nom d'utilisateur (on vérifie qu'il existe)

		$username = $_POST['username'];

		$sth = $connexion->prepare('SELECT * FROM utilisateur WHERE utilisateur_username = :utilisateur_username');
		$sth->bindParam(':utilisateur_username', $username);
		$sth->execute();

		$resultat = $sth->fetch();

		if ($resultat === false) {
			echo 'Identifiants incorrectes.';
		} else {
			$password = $_POST['password'];

			// Etape 5 : vérification du mot de passe
			$verification = password_verify($password, $resultat['utilisateur_mdp']);

			if (!$verification) {
				echo 'Identifiants incorrectes.';
			} else {
				echo 'Vous êtes maintenant connecté.';
				header('refresh:3; url=backoffice.php');
			}
		}

	} else {
		echo 'Veuillez remplir tous les champs.';
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="backoffice.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Connexion</title>
</head>
<body>

	<form action="#" method="POST">
		<label for="username">Nom d'utilisateur</label>
		<input type="text" name="username" id="username">

		<label for="password" id="password">Mot de passe</label>
		<input  id="password" type="password" name="password">

		<button class="btn btn-primary me-md-2">Connexion</button>
	</form>
</body>
</html>