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
    <link rel="shortcut icon" type="image/x-icon" href="../assets/logo.ico"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes//header/header.css">
    <link rel="stylesheet" href="../includes/footer/footer.css"> 
    <link rel="stylesheet" href="galerie.css">
    <script src="accueil.js"></script>
    <title>PATTE Z'EN CINQ</title>
</head>
<header>
    <?php require '../includes/header2/header.php'?>
</header>
<body>
    <div class="galerie-description">
        <h1>Bienvenue dans la galerie, vous retrouverez ici des photos des toutous dont nous nous occupons  </h1>
    </div>
    <div class="galerie-box">
    <?php foreach ($liste as $elementDeLaListe){?>
        <div class="galerie-container">
            <h2 class="nom-chien"><?= $elementDeLaListe["photo_libelle"]?></h2>
            <a href="#" class="galerie-img" style="background-image:url(../assets/<?= $elementDeLaListe["photo_url"]?>);"></a>
        </div>
    <?php } ?>

</body>
<footer>
<?php require '../includes/footer2/footer.php'?>

</footer>
</html>