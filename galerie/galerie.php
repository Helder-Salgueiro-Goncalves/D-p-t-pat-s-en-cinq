<?php 
 require '../includes/connexion_bdd/connexion_bdd.php';
 
 $nombre = 0;

$query = $connexion->prepare("SELECT * FROM photo");
$query->execute();

$liste = $query->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes//header/header.css">
    <link rel="stylesheet" href="../includes/footer/footer.css"> 
    <link rel="stylesheet" href="galerie.css">
    <script src="accueil.js"></script>
    <title>galerie</title>
</head>
<header>
    <?php require '../includes/header2/header.php'?>
</header>
<body>
    <div class="galerie-description">
        <h1>Bienvenue dans la galerie, vous retrouverez ici des photos de toutous que nous nous occupons  </h1>
    </div>
    <div class="galerie-box">
    <?php foreach ($liste as $elementDeLaListe){?>
        <div class="galerie-container">
            <a href="#" class="galerie-img" style="background-image:url(../assets/<?= $elementDeLaListe["photo_url"]?>);"></a>
            <h2 class="nom-chien"><?= $elementDeLaListe["photo_libelle"]?></h2>

    </div>
<?php } ?>

</body>
<footer>
<?php require '../includes/footer2/footer.php'?>

</footer>
</html>