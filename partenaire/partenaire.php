<?php 
 require '../includes/connexion_bdd/connexion_bdd.php';

$nombre = 0;

$query = $connexion->prepare("SELECT * FROM partenaire");
$query->execute();

$liste = $query->fetchAll();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="partenaire.css">
    <link rel="stylesheet" href="../includes//header/header.css">
    <link rel="stylesheet" href="../includes/footer/footer.css"> 
    <script src="prestation.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestation</title>
</head>
<header>
<?php require '../includes/header2/header.php'?>

</header>

<body>
    <div class="prestation-menu">
        <h2>Vous trouverez ici, les différents partenaires avec qui nous collaborons.</h2>
    </div>
    <div class="prestation-box">
        <?php foreach ($liste as $elementDeLaListe){
                ?>
                    <div class="prestation-container">
                        <h1><?= $elementDeLaListe["part_libelle"]?> </h1>
                        <p><?= $elementDeLaListe["part_descriptif"]?> </p>
                        <h3><?= $elementDeLaListe["part_type"]?></h3>
                    </div>
                    <?php $nombre = $nombre + 1 ?>
                <?php
        }?>
    </div>

</body>
<footer>
<?php require '../includes/footer2/footer.php'?>
</footer>