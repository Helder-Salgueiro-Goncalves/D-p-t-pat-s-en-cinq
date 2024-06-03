<?php
require './includes/connexion_bdd/connexion_bdd.php';

// Récupération du titre1 de la partie 'PRESTATION' de l'accueil
$titrePrestationAccueil1 = $connexion->prepare('SELECT prestation_libelle FROM prestation ORDER BY prestation_libelle ASC LIMIT 1;');
$titrePrestationAccueil1->execute();
$PrestationAccueilTitre1 = $titrePrestationAccueil1->fetch();
$PrestationAccueilTitre1 = $PrestationAccueilTitre1['prestation_libelle'];

// Récupération du titre2 de la partie 'PRESTATION' de l'accueil
$titrePrestationAccueil2 = $connexion->prepare('SELECT prestation_libelle FROM prestation ORDER BY prestation_libelle ASC LIMIT 1, 2;');
$titrePrestationAccueil2->execute();
$PrestationAccueilTitre2 = $titrePrestationAccueil2->fetch();
$PrestationAccueilTitre2 = $PrestationAccueilTitre2['prestation_libelle'];
// Récupération du titre3 de la partie 'PRESTATION' de l'accueil
$titrePrestationAccueil3 = $connexion->prepare('SELECT prestation_libelle FROM prestation ORDER BY prestation_libelle ASC LIMIT 2, 3;');
$titrePrestationAccueil3->execute();
$PrestationAccueilTitre3 = $titrePrestationAccueil3->fetch();
$PrestationAccueilTitre3 = $PrestationAccueilTitre3['prestation_libelle'];
// Récupération du titre4 de la partie 'PRESTATION' de l'accueil
$titrePrestationAccueil4 = $connexion->prepare('SELECT prestation_libelle FROM prestation ORDER BY prestation_libelle ASC LIMIT 3, 4 ;');
$titrePrestationAccueil4->execute();
$PrestationAccueilTitre4 = $titrePrestationAccueil4->fetch();
$PrestationAccueilTitre4 = $PrestationAccueilTitre4['prestation_libelle'];

// Récupération de la description1 de la partie 'PRESTATION' de l'accueil
$descriptionPrestationAccueil1 = $connexion->prepare('SELECT prestation_contenu FROM prestation ORDER BY prestation_contenu ASC LIMIT 1');
$descriptionPrestationAccueil1->execute();
$PrestationAccueil1 = $descriptionPrestationAccueil1->fetch();
$PrestationAccueil1 = $PrestationAccueil1['prestation_contenu'];
// Récupération de la description2 de la partie 'PRESTATION' de l'accueil
$descriptionPrestationAccueil2 = $connexion->prepare('SELECT prestation_contenu FROM prestation ORDER BY prestation_contenu ASC LIMIT 1, 2');
$descriptionPrestationAccueil2->execute();
$PrestationAccueil2 = $descriptionPrestationAccueil2->fetch();
$PrestationAccueil2 = $PrestationAccueil2['prestation_contenu'];
// Récupération de la description3 de la partie 'PRESTATION' de l'accueil
$descriptionPrestationAccueil3 = $connexion->prepare('SELECT prestation_contenu FROM prestation ORDER BY prestation_contenu ASC LIMIT 2, 3');
$descriptionPrestationAccueil3->execute();
$PrestationAccueil3 = $descriptionPrestationAccueil3->fetch();
$PrestationAccueil3 = $PrestationAccueil3['prestation_contenu'];
// Récupération de la description4 de la partie 'PRESTATION' de l'accueil
$descriptionPrestationAccueil4 = $connexion->prepare('SELECT prestation_contenu FROM prestation ORDER BY prestation_contenu ASC LIMIT 3, 4');
$descriptionPrestationAccueil4->execute();
$PrestationAccueil4 = $descriptionPrestationAccueil4->fetch();
$PrestationAccueil4 = $PrestationAccueil4['prestation_contenu'];

// Récupération de la description de la partie 'METHODE' de l'accueil
$descriptionMethodeAccueil = $connexion->prepare('SELECT meth_descriptif FROM methode');
$descriptionMethodeAccueil->execute();
$MethodeAccueil = $descriptionMethodeAccueil->fetch();
$MethodeAccueil = $MethodeAccueil['meth_descriptif'];

// Récupération du nom1 de la partie 'PARTENAIRE' de l'accueil
$nomPartenaireAccueil1 = $connexion->prepare('SELECT part_libelle FROM partenaire ORDER BY part_libelle ASC LIMIT 1,2');
$nomPartenaireAccueil1->execute();
$PartenaireAccueil1 = $nomPartenaireAccueil1->fetch();
$PartenaireAccueil1 = $PartenaireAccueil1['part_libelle'];
// Récupération du nom2 de la partie 'PARTENAIRE' de l'accueil
$nomPartenaireAccueil2 = $connexion->prepare('SELECT part_libelle FROM partenaire ORDER BY part_libelle DESC LIMIT 1');
$nomPartenaireAccueil2->execute();
$PartenaireAccueil2 = $nomPartenaireAccueil2->fetch();
$PartenaireAccueil2 = $PartenaireAccueil2['part_libelle'];
// Récupération du nom3 de la partie 'PARTENAIRE' de l'accueil
$nomPartenaireAccueil3 = $connexion->prepare('SELECT part_libelle FROM partenaire ORDER BY part_libelle ASC LIMIT 3, 4');
$nomPartenaireAccueil3->execute();
$PartenaireAccueil3 = $nomPartenaireAccueil3->fetch();
$PartenaireAccueil3 = $PartenaireAccueil3['part_libelle'];
// Récupération du nom4 de la partie 'PARTENAIRE' de l'accueil
$nomPartenaireAccueil4 = $connexion->prepare('SELECT part_libelle FROM partenaire ORDER BY part_libelle ASC LIMIT 4, 5');
$nomPartenaireAccueil4->execute();
$PartenaireAccueil4 = $nomPartenaireAccueil4->fetch();
$PartenaireAccueil4 = $PartenaireAccueil4['part_libelle'];

// Récupération de la description1 de la partie 'PARTENAIRE' de l'accueil
$descriptionPartenaireAccueil1 = $connexion->prepare('SELECT part_descriptif FROM partenaire ORDER BY part_descriptif ASC LIMIT 1');
$descriptionPartenaireAccueil1->execute();
$PartenaireAccueilDescription1 = $descriptionPartenaireAccueil1->fetch();
$PartenaireAccueilDescription1 = $PartenaireAccueilDescription1['part_descriptif'];
// Récupération de la description2 de la partie 'PARTENAIRE' de l'accueil
$descriptionPartenaireAccueil2 = $connexion->prepare('SELECT part_descriptif FROM partenaire ORDER BY part_descriptif ASC LIMIT 1, 2');
$descriptionPartenaireAccueil2->execute();
$PartenaireAccueilDescription2 = $descriptionPartenaireAccueil2->fetch();
$PartenaireAccueilDescription2 = $PartenaireAccueilDescription2['part_descriptif'];
// Récupération de la description3 de la partie 'PARTENAIRE' de l'accueil
$descriptionPartenaireAccueil3 = $connexion->prepare('SELECT part_descriptif FROM partenaire ORDER BY part_descriptif ASC LIMIT 2, 3');
$descriptionPartenaireAccueil3->execute();
$PartenaireAccueilDescription3 = $descriptionPartenaireAccueil3->fetch();
$PartenaireAccueilDescription3 = $PartenaireAccueilDescription3['part_descriptif'];
// Récupération de la description4 de la partie 'PARTENAIRE' de l'accueil
$descriptionPartenaireAccueil4 = $connexion->prepare('SELECT part_descriptif FROM partenaire ORDER BY part_descriptif ASC LIMIT 3, 4');
$descriptionPartenaireAccueil4->execute();
$PartenaireAccueilDescription4 = $descriptionPartenaireAccueil4->fetch();
$PartenaireAccueilDescription4 = $PartenaireAccueilDescription4['part_descriptif'];

// Récupération du prenom de la partie 'COMMENTAIRE' de l'accueil
$prenomCommentaireAccueil = $connexion->prepare('SELECT auteur_prenom FROM auteur ORDER BY auteur_prenom ASC LIMIT 1');
$prenomCommentaireAccueil->execute();
$commentaireAccueilPrenom = $prenomCommentaireAccueil->fetch();
$commentaireAccueilPrenom = $commentaireAccueilPrenom['auteur_prenom'];
// Récupération du nom de la partie 'COMMENTAIRE' de l'accueil
$nomCommentaireAccueil = $connexion->prepare('SELECT auteur_nom FROM auteur ORDER BY auteur_nom ASC LIMIT 1');
$nomCommentaireAccueil->execute();
$commentaireAccueilNom = $nomCommentaireAccueil->fetch();
$commentaireAccueilNom = $commentaireAccueilNom['auteur_nom'];
// Récupération de la description de la partie 'COMMENTAIRE' de l'accueil
$descriptionCommentaireAccueil = $connexion->prepare('SELECT livre_contenu FROM livre_dor ORDER BY livre_id ASC LIMIT 1');
$descriptionCommentaireAccueil->execute();
$commentaireAccueildescription = $descriptionCommentaireAccueil->fetch();
$commentaireAccueildescription = $commentaireAccueildescription['livre_contenu'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="./includes/header//header.css">
    <link rel="stylesheet" href="./includes/footer/footer.css">
    <script src="accueil.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PATTE Z'EN CINQ</title>
</head>
<header>
    <?php require './includes/header/header.php' ?>

</header>

<body>
    <section>
        <div class="img-presentation">
            <p style="font-family: Arial;" class="txt-presentation">PATTE Z'EN CINQ</p>
        </div>
    </section>
    <section>
        <div class="s2">
            <aside class="about">
                <img src="./assets/difelice.jpg">
                <h2>QUI SUIS-JE ?</h2>
                <p>De ma naissance jusqu'à mon âge actuel, j'ai vécu avec toute sorte d'animaux. J'ai toujours aimé leur compagnie en particulier celles des chiens. J'avais une grande complicité avec nos chiens mais aussi ceux de mon entourage. Passionnée depuis toujours, le travail que j'ai choisi associ plusieurs points très importants pour moi. Avoir un travail passionnant, évolutif et pouvoir aider les gens et les chiens. Pour pouvoir aider au mieux, j'ai souhaité améliorer mes connaissances en effectuant une formation de 8 mois pour obtenir le Brevet Professionnel d'Educateur Canin le seul diplôme reconnu d'état d'actuellement.</p>
                <a href="./details/details.php">en savoir plus</a>
            </aside>

            <div class="home-prestation-mere">
                <h1>PRESTATIONS</h1>
                <div class="home-prestation-fille">
                    <div class="home-prestation-container">
                        <h2><?= $PrestationAccueilTitre1 ?></h2>
                        <p><?= $PrestationAccueil1 ?></p>
                    </div>
                    <div class="home-prestation-container">
                        <h2><?= $PrestationAccueilTitre2 ?></h2>
                        <p><?= $PrestationAccueil2 ?></p>
                    </div>
                    <div class="home-prestation-container">
                        <h2><?= $PrestationAccueilTitre3 ?></h2>
                        <p><?= $PrestationAccueil3 ?></p>
                    </div>
                    <div class="home-prestation-container">
                        <h2><?= $PrestationAccueilTitre4 ?></h2>
                        <p><?= $PrestationAccueil4 ?></p>
                    </div>
                </div>
                <div class="home-prestation-btn">
                    <a href="./prestation/prestation.php">voir plus</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div id="slider">
            <img src="assets/dog.jpg" alt="./assets/dog2.jpg" id="slide">
            <div id="precedent" onclick="ChangeSlide(-1)">
                </div>
                    <div id="suivant" onclick="ChangeSlide(1)">></div>
            </div>
    </section>
    <section>
        <div class="methode">
            <h1>METHODES</h1>
            <div class="methode-container">
                <h3>METHODE RESPECTUEUSE ET POSITIVE :</h3>
                <p><?= $MethodeAccueil ?></p>
            </div>

        </div>
    </section>
    <section>
        <div class="partenaire">
            <h1>NOS PARTENAIRES</h1>
            <div class="partenaire-container">
                <div class="partenaire-box">
                    <h3><?= $PartenaireAccueil1 ?></h3>
                    <p><?= $PartenaireAccueilDescription1 ?></p>
                </div>
                <div class="partenaire-box">
                    <h3><?= $PartenaireAccueil2 ?></h3>
                    <p><?= $PartenaireAccueilDescription2 ?></p>
                </div>
                <div class="partenaire-box">
                    <h3><?= $PartenaireAccueil3 ?></h3>
                    <p><?= $PartenaireAccueilDescription3 ?></p>
                </div>
                <div class="partenaire-box">
                    <h3><?= $PartenaireAccueil4 ?></h3>
                    <p><?= $PartenaireAccueilDescription4 ?></p>
                </div>
            </div>
            <a href="./partenaire/partenaire.php" class="methode-btn">Voir plus de partenaires</a>
        </div>

    </section>
    <section>
        <div class="commentaire">
            <h1>COMMENTAIRES</h1>
            <div class="commentaire-container">
                <div class="commentaire-box">
                    <h3><?= $commentaireAccueilPrenom ?> <?= $commentaireAccueilNom ?></h3>
                    <p><?= $commentaireAccueildescription ?></p>
                    <div class="commentaire-note">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <a href="./livre_d'or/livre.php" class="methode-btn">Voir plus de commentaires</a>

            </div>

        </div>
    </section>
    <section>
        <div class="video-container">
            <div class="video">
                <iframe width="50%" height="500" src="https://www.youtube.com/embed/SPgZveozD9g?si=o-JGdhrs5itp8sTZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <section>
        <div class="localisation">
            <h1>LOCALISATION</h1>
            <div class="localisation-container">
                <h3>Maison Forestière de la Faisanderie, 60200 Compiègne</h3>
                <div class="localisation-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10386.492450073441!2d2.862719277142806!3d49.397120957534696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7d5f62195814d%3A0xe1c973a20612c8f3!2sMaison%20Foresti%C3%A8re%20de%20la%20Faisanderie%2C%2060200%20Compi%C3%A8gne!5e0!3m2!1sfr!2sfr!4v1686832989635!5m2!1sfr!2sfr" width="50%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</body>
<footer>
    <?php require './includes/footer/footer.php' ?>
</footer>

</html>