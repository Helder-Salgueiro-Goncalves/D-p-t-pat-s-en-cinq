<?php
require '../includes/connexion_bdd/connexion_bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_FILES['photo_url'])){
        $tmpName = $_FILES['photo_url']['tmp_name'];
        $name = $_FILES['photo_url']['name'];
        $size = $_FILES['photo_url']['size'];
        $error = $_FILES['photo_url']['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 40000000;

        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $uniqueName = uniqid('', true);
            $file = $uniqueName.".".$extension;
            move_uploaded_file($tmpName, '../assets/'.$file);
        
            $nom_photo = $_POST['photo_libelle'];
        
            $stmt = $connexion->prepare("INSERT INTO photo (photo_libelle, photo_url) 
                                        VALUES (:nom, :url)");
            $stmt->bindParam(':nom', $nom_photo);
            $stmt->bindParam(':url', $file);
        
            if ($stmt->execute()) {
                $success_message = "La photo a été ajoutée dans la galerie avec succès."; 
            } else {
                $error_message = "Erreur lors de l'ajout de la photo dans la galerie.";
            }
        } else {
            if(!in_array($extension, $extensions)) {
                $error_message = "Extension du fichier non autorisée.";
            } else if($size > $maxSize) {
                $error_message = "Le fichier est trop grand.";
            } else if($error != 0) {
                $error_message = "Erreur lors du téléchargement du fichier. Code d'erreur : " . $error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backoffice.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter une photo dans la galerie</title>
</head>

<body>
    <h1>Ajouter une photo dans la galerie :</h1>
    <form action="add_galerie.php" method="post" enctype="multipart/form-data">
        <label for="photo_libelle">Nom du chien :</label>
        <input class="form-control"  type="text" name="photo_libelle" required><br>

        <label for="photo_url">Photo du chien</label>
        <input class="form-control"  type="file" name="photo_url" required><br>


        <input class="btn btn-primary me-md-2" type="submit" value="Ajouter la photo du chien">
    </form>

    <?php if (isset($success_message)) : ?>
        <p><?= $success_message ?></p>
    <?php elseif (isset($error_message)) : ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>
    <br>
    <div class="button-container">
       <a href="view_galerie.php" class="btn btn-danger">Retour à la liste des photos</a>
    </div>
</body>

</html>