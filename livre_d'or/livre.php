<?php
require '../includes/connexion_bdd/connexion_bdd.php';

$nombre = 1;

$query = $connexion->prepare("SELECT * FROM auteur");
$query->execute();

$liste = $query->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_auteur = $_POST['auteur_nom'];
    $prenom_auteur = $_POST['auteur_prenom'];
    $mail_auteur = $_POST['auteur_mail'];
    $contenu_auteur = $_POST['auteur_contenu'];

    $stmt = $connexion->prepare("INSERT INTO auteur (auteur_nom, auteur_prenom, auteur_mail, auteur_contenu) 
                                VALUES (:nom, :prenom, :mail, :contenu)");
    $stmt->bindParam(':nom', $nom_auteur);
    $stmt->bindParam(':prenom', $prenom_auteur);
    $stmt->bindParam(':mail', $mail_auteur);
    $stmt->bindParam(':contenu', $contenu_auteur);

    if ($stmt->execute()) {
        $success_message = "La message a été ajoutée avec succès.";
    } else {
        $error_message = "Erreur lors de l'ajout du message.";
    }

    if ($stmt->execute()) {
        $success_message = "La message a été ajoutée avec succès.";
    } else {
        $error_message = "Erreur lors de l'ajout du message.";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="livre.css">
    <link rel="stylesheet" href="../includes//header/header.css">
    <link rel="stylesheet" href="../includes/footer/footer.css">
    <script src="livre.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
</head>
<header>
    <?php require '../includes/header2/header.php' ?>

</header>

<body>
    <h1 class="livre-titre">Livre d'or</h1>
    <div class="comment-button">

        <div>
            <button id="openmodal">Laisser un commentaire</button>
        </div>
        <dialog id="modal">
            <form method="post">
                <h1>Laisser un commentaire</h1>
                <h2>Nom : </h2>
                <div class="input-modal">
                    <input type="text" placeholder="Votre nom" name="auteur_nom" required>
                </div>
                <h2>Prénom : </h2>
                <div class="input-modal">
                    <input type="text" placeholder="Votre prénom" name="auteur_prenom" required>
                </div>
                <h2>Adresse Mail : </h2>
                <div class="input-modal">
                    <input type="text" placeholder="Votre adresse mail" name="auteur_mail">
                </div>
                <h2>Commentaire : </h2>
                <div class="input-modal">
                    <textarea name="auteur_contenu" class="input-modal" cols="30" rows="10" placeholder="Votre avis"></textarea>
                </div>

                <div class="submit-modal">
                    <input class="modal-input" type="submit" value="Envoyer">
                </div>
            </form>


            <button id="closemodal">Fermer</button>
        </dialog>
        <script>
            var modal = document.querySelector('#modal')
            var openBtn = document.querySelector('#openmodal')
            var closeBtn = document.querySelector('#closemodal')

            openBtn.addEventListener("click", () => {
                modal.showModal()
            })
            closeBtn.addEventListener("click", () => {
                modal.close()
            })
        </script>



    </div>
    <section>
        <div class="comment-box">

            <?php foreach ($liste as $elementDeLaListe) { ?>
                <div class="comment-container">
                    <h2 class="comment-name"><?= $elementDeLaListe['auteur_prenom'] ?> <?= $elementDeLaListe['auteur_nom'] ?></h2>
                    <div class="note-container">
                        <h3 class="comment-note">Note : <?= $elementDeLaListe['auteur_note'] ?> / 5</h3>
                    </div>
                    <p class="comment-text"><?= $elementDeLaListe['auteur_contenu'] ?></p>
                </div>
            <?php } ?>


        </div>
    </section>

</body>
<footer>
    <?php require '../includes/footer2/footer.php' ?>
</footer>