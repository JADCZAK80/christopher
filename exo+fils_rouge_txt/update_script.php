<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=record', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

if (isset($_POST['submit_button'])) {
    // Validation et échappement des données utilisateur (à ajouter)

    $title = $_POST['titre'];
    $artist = $_POST['artist'];
    $years = $_POST['years'];
    $genre = $_POST['genre'];
    $label = $_POST['label'];
    $price = $_POST['prix'];
    $picture = $_POST['image'];
    $numero = $_POST['disc_id'];
    // Récupérer le fichier temporaire
    $uploadedFile = $_FILES['image']['tmp_name'];

    // Définir l'emplacement de destination (dans le dossier "pictures")
    $destination = 'pictures/' . $_FILES['image']['name'];

    // Déplacer le fichier téléchargé vers le dossier de destination
    if (move_uploaded_file($uploadedFile, $destination)) {
        // Modifier les autorisations du fichier (par exemple, 0644 pour les autorisations de lecture et d'écriture pour le propriétaire, et de lecture pour les autres)
        chmod($destination, 777);
        
        echo "Le fichier a été téléchargé et les autorisations ont été modifiées avec succès.";
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
        
        try {
            // Démarrez la transaction
            $db->beginTransaction();
        // Utilisez une requête SQL pour mettre à jour l'enregistrement
        $query = "UPDATE disc 
                  SET disc_title = :title, disc_year = :years, disc_picture = :picture, disc_label = :label, disc_genre = :genre, disc_price = :price, artist_id = :artist
                  WHERE disc_id = :disc_id";

        $stmt = $db->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':years', $years);
        $stmt->bindParam(':picture', $picture);  // Utilisez la nouvelle destination du fichier
        $stmt->bindParam(':label', $label);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':artist', $artist);
        $stmt->bindParam(':disc_id', $numero); 

        // Exécution de la requête
        $stmt->execute();
    // Valider la transaction
    $db->commit();
        // Redirection vers la page d'accueil
        header("Location: index.php");
        exit;
    }catch (PDOException $e) {
    // En cas d'erreur, annuler la transaction et afficher un message d'erreur
    $db->rollBack();
    echo "Erreur : " . $e->getMessage();
}
}

?>
