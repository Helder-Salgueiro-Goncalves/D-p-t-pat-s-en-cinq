<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backoffice.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Modifier les informations</title>
</head>
<body>
    <h1>Modifier les informations :</h1>
    <a style="margin-top: 50px;margin-bottom: 20px;" class="btn btn-danger" href= "backoffice.php">Retour au menu principal</a>

    <?php
    require '../includes/connexion_bdd/connexion_bdd.php'; // Inclusion de votre fichier de connexion à la base de données

    $a_propos = null;
    $success_message = $error_message = '';

    try {
        // Sélectionner toutes les lignes de la table a_propos
        $stmt = $connexion->query("SELECT * FROM a_propos");
        $a_propos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$a_propos) {
            echo "Aucune donnée trouvée dans la table a_propos.";
        }

        // Traitement du formulaire de mise à jour des données
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profil = $_POST['a_propos_profil'];
            $histoire = $_POST['a_propos_histoire'];
            $profession = $_POST['a_propos_profession'];

            // Mettre à jour toutes les lignes de la table a_propos (attention, c'est juste pour l'exemple)
            $stmt = $connexion->prepare("UPDATE a_propos 
                                         SET a_propos_profil = :profil, 
                                             a_propos_histoire = :histoire, 
                                             a_propos_profession = :profession");
            $stmt->bindParam(':profil', $profil);
            $stmt->bindParam(':histoire', $histoire);
            $stmt->bindParam(':profession', $profession);

            if ($stmt->execute()) {
                $success_message = "Les informations ont été modifiées avec succès.";
                // Recharger les données après la mise à jour (si nécessaire)
                $stmt = $connexion->query("SELECT * FROM a_propos");
                $a_propos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $error_message = "Erreur lors de la modification des informations.";
            }
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

    <?php if ($a_propos) : ?>
    <form action="update_details.php" method="post">
        <?php foreach ($a_propos as $item) : ?>
        <div class="mb-3">
            <label for="a_propos_profil_<?= $item['a_propos_id'] ?>" class="form-label">Section "Qui suis-je ?" :</label>
            <textarea class="form-control" id="a_propos_profil_<?= $item['a_propos_id'] ?>" name="a_propos_profil"><?= $item['a_propos_profil'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="a_propos_profession_<?= $item['a_propos_id'] ?>" class="form-label">Section "Ce que je fais ?" :</label>
            <textarea class="form-control" id="a_propos_profession_<?= $item['a_propos_id'] ?>" name="a_propos_profession"><?= $item['a_propos_profession'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="a_propos_histoire_<?= $item['a_propos_id'] ?>" class="form-label">Section "Notre histoire" :</label>
            <textarea class="form-control" id="a_propos_histoire_<?= $item['a_propos_id'] ?>" name="a_propos_histoire"><?= $item['a_propos_histoire'] ?></textarea>
        </div>
        <?php endforeach; ?>
        <input class="btn btn-primary me-md-2" type="submit" value="Modifier les informations">
    </form>
    <?php else : ?>
    <p>Aucune donnée trouvée dans la table a_propos.</p>
    <?php endif; ?>

    <?php if ($success_message) : ?>
        <p><?= $success_message ?></p>
    <?php elseif ($error_message) : ?>
        <p><?= $error_message ?></p>
    <?php endif; ?>
    <br>
    <div class="button-container">
    </div>
</body>