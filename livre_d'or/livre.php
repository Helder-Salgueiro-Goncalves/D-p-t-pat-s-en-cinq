<?php
require '../includes/connexion_bdd/connexion_bdd.php';

$query = $connexion->prepare("SELECT * FROM livre_dor");
$query->execute();

$liste = $query->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom_auteur = $_POST['auteur_nom'];
    $prenom_auteur = $_POST['auteur_prenom'];
    $mail_auteur = $_POST['auteur_mail'];
    $contenu_auteur = $_POST['livre_contenu'];
    $auteur_note = $_POST['auteur_note'];

    $stmt = $connexion->prepare("INSERT INTO livre_dor (auteur_nom, auteur_prenom, auteur_mail, livre_contenu, auteur_note, livre_date_publication) 
                                VALUES (:nom, :prenom, :mail, :contenu, :note, NOW())");
    $stmt->bindParam(':nom', $nom_auteur);
    $stmt->bindParam(':prenom', $prenom_auteur);
    $stmt->bindParam(':mail', $mail_auteur);
    $stmt->bindParam(':contenu', $contenu_auteur);
    $stmt->bindParam(':note', $auteur_note);

    if ($stmt->execute()) {
        $success_message = "Le message a été ajouté avec succès.";
        header("Location: livre.php"); // Redirige vers la même page
        exit;
    } else {
        $error_message = "Erreur lors de l'ajout du message.";
        header("Location: livre.php"); // Redirige vers la même page
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="livre.css">
    <link rel="stylesheet" href="../includes//header/header.css">
    <link rel="stylesheet" href="../includes/footer/footer.css">
    <script src="livre.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PATTE Z'EN CINQ</title>
</head>
<header>
    <?php require '../includes/header2/header.php' ?>

</header>

<body>
    <h1 class="livre-titre">Livre d'or</h1>
    <div class="comment-button">

        <div>
            <button id="openmodal" class="button-36">Laisser un commentaire</button>
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
                <h2>Une note sur 5 : </h2>
                <div class="input-modal">
                    <select name="auteur_note" id="note" width="150px" required>
                        <option value="" <?php if(!isset($auteur_note) || $auteur_note == "") echo "selected";?>>Votre note</option>
                        <option value="1" <?php if(isset($auteur_note) && $auteur_note == 1) echo "selected";?>>1 / 5</option>
                        <option value="2" <?php if(isset($auteur_note) && $auteur_note == 2) echo "selected";?>>2 / 5</option>
                        <option value="3" <?php if(isset($auteur_note) && $auteur_note == 3) echo "selected";?>>3 / 5</option>
                        <option value="4" <?php if(isset($auteur_note) && $auteur_note == 4) echo "selected";?>>4 / 5</option>
                        <option value="5" <?php if(isset($auteur_note) && $auteur_note == 5) echo "selected";?>>5 / 5</option>
                    </select>
                </div>
                <h2>Commentaire : </h2>
                <div class="input-modal">
                    <textarea name="livre_contenu" class="input-modal" cols="30" rows="10" placeholder="Donnez nous votre avis"></textarea>
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
                        <h3 class="comment-note">
                            <?php
                                $i = 0;
                                do {
                                    $i++;
                                    echo "<i class='fa-solid fa-star'></i>";
                                } while ($elementDeLaListe['auteur_note'] > $i);
                            ?>
                        </h3>
                    </div>
                    <p class="comment-text"><?= $elementDeLaListe['livre_contenu'] ?></p>
                </div>
            <?php } ?>


        </div>
    </section>

</body>
<footer>
    <?php require '../includes/footer2/footer.php' ?>
</footer>