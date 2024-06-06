<?php
require '../includes/connexion_bdd/connexion_bdd.php';

$nombre = 0;

$query = $connexion->prepare("SELECT * FROM a_propos");
$query->execute();

$liste = $query->fetchAll();

$query = $connexion->prepare("SELECT * FROM assistant_canin");
$query->execute();

$listeChien = $query->fetchAll();

$query = $connexion->prepare("SELECT * FROM formation");
$query->execute();

$listeFormation = $query->fetchAll();

$assistant_libelle = $connexion->prepare('SELECT assistant_libelle FROM assistant WHERE assistant_id = 1;');
$assistant_libelle->execute();
$libelle_assistant = $assistant_libelle->fetch();
$libelle_assistant = $libelle_assistant['assistant_libelle'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="A_propos.css">
    <link rel="stylesheet" href="../includes//header/header.css">
    <link rel="stylesheet" href="../includes/footer/footer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <?php require '../includes/header2/header.php' ?>
</header>

<body>
    <section class="s1">
        <div class="menu-img">
            <p class="txt-presentation">
                AURORE DI FELICE
            </p>
        </div>
    </section>
    <section class="s2">

        <div class="details-container">
            <h2>QUI SUIS-JE ?</h2>
            <?php foreach ($liste as $elementDeLaListe) { ?>
                            <p><?= $elementDeLaListe['a_propos_profil'] ?></p>
                    </div>

                    <div class="details-container">
                        <h2>CE QUE JE FAIS :</h2>
                        <p><?= $elementDeLaListe['a_propos_profession'] ?></p>
                    </div>

                    <div class="details-container">
                        <h2>NOTRE HISTOIRE :</h2>
                        <p><?= $elementDeLaListe['a_propos_histoire'] ?></p>
                    </div>
        <?php } ?>

        <div class="details-container">
            <h2>MES ASSISTANTS :</h2>
            <p><?= $libelle_assistant ?></p>
        </div>
        <div class="details-container">
            <h2>MES ASSISTANTS CANINS : </h2>
            <?php foreach ($listeChien as $elementDeLaListeChien) { ?>

                <h3><img src="../assets/point.png" width="16px" height="16px"> <?= $elementDeLaListeChien['assistant_canin_nom'] ?></h3>
                <p><?= $elementDeLaListeChien['assistant_canin_libelle'] ?></p>
            <?php } ?>
        </div>



        <div class="details-container">
            <h2>MES FORMATIONS </h2>
            <?php foreach ($listeFormation as $elementDeLaListeFormation) { ?>

                <p> <?= $elementDeLaListeFormation['formation_libelle'] ?></p>

            <?php } ?>
        </div>
    </section>

</body>
<footer>
    <?php require '../includes/footer2/footer.php' ?>
</footer>

</html>