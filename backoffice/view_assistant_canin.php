<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backoffice.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Modifier les assistants canin</title>
</head>
<body>
    <h1>Modifier les assistants canin :</h1>
    <div class="button-container">
        <a href="backoffice.php" class="btn btn-danger">Retour au menu principal</a>
    </div>
    <?php
        require '../includes/connexion_bdd/connexion_bdd.php'; // Inclusion de votre fichier de connexion à la base de données
        $assistant_canin = null;
        $success_message = $error_message = '';

        try {
            // Sélectionner toutes les lignes de la table assistant_canin
            $stmt = $connexion->query("SELECT * FROM assistant_canin");
            $assistant_canin = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$assistant_canin) {
                echo "Aucune donnée trouvée dans la table assistant_canin.";
            }

            // Traitement du formulaire de mise à jour des données
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                foreach ($_POST['assistant_canin'] as $id => $data) {
                    $assistant_canin_nom = $data['nom'];
                    $assistant_canin_libelle = $data['libelle'];

                    // Mettre à jour la ligne correspondante de la table assistant_canin
                    $stmt = $connexion->prepare("UPDATE assistant_canin 
                                                SET assistant_canin_nom = :assistant_canin_nom, 
                                                    assistant_canin_libelle = :assistant_canin_libelle
                                                WHERE id = :id");
                    $stmt->bindParam(':assistant_canin_nom', $assistant_canin_nom);
                    $stmt->bindParam(':assistant_canin_libelle', $assistant_canin_libelle);
                    $stmt->bindParam(':id', $id);

                    if ($stmt->execute()) {
                        $success_message = "Les informations ont été modifiées avec succès.";
                    } else {
                        $error_message = "Erreur lors de la modification des informations.";
                    }
                }
                // Recharger les données après la mise à jour
                $stmt = $connexion->query("SELECT * FROM assistant_canin");
                $assistant_canin = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    if ($assistant_canin) : ?>
        <form action="view_assistant_canin.php" method="post">
            <?php foreach ($assistant_canin as $item) : ?>
            <div class="mb-3">
                <label for="assistant_canin_nom_<?= htmlspecialchars($item['id']) ?>" class="form-label">Nom de l'assistant :</label>
                <input type="text" class="form-control" id="assistant_canin_nom_<?= htmlspecialchars($item['id']) ?>" name="assistant_canin[<?= htmlspecialchars($item['id']) ?>][nom]" value="<?= htmlspecialchars($item['assistant_canin_nom']) ?>">

                <label for="assistant_canin_libelle_<?= htmlspecialchars($item['id']) ?>" class="form-label">Information :</label>
                <textarea class="form-control" id="assistant_canin_libelle_<?= htmlspecialchars($item['id']) ?>" name="assistant_canin[<?= htmlspecialchars($item['id']) ?>][libelle]"><?= htmlspecialchars($item['assistant_canin_libelle']) ?></textarea>
            </div>
            <?php endforeach; ?>
            <input class="button-36" type="submit" value="Modifier les informations">
        </form>
        <?php else : ?>
            <p>Aucune donnée trouvée dans la table assistant_canin.</p>
        <?php 
    endif; ?>
    <?php if ($success_message) : ?>
        <p><?= htmlspecialchars($success_message) ?></p>
    <?php elseif ($error_message) : ?>
        <p><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>
    <br>

</body>
</html>
