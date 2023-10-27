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
    $title = $_POST['titre'];
    $artist = $_POST['artist'];
    $years = $_POST['years'];
    $genre = $_POST['genre'];
    $label = $_POST['label'];
    $picture = $_POST['image'];
    $price = $_POST['prix'];

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

    // Ajoutez une nouvelle entrée dans la table "disc" (ou votre table correspondante)
    $query = "INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) 
              VALUES (:title, :years, :picture, :label, :genre, :price, :artist)";
    $stmt = $db->prepare($query);

    // Liaison des paramètres
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':years', $years);
    $stmt->bindParam(':picture', $picture);
    $stmt->bindParam(':label', $label);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':artist', $artist);

    // Exécution de la requête
    $stmt->execute();

    // Valider la transaction
    $db->commit();
    
    // Redirection vers la page d'accueil
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    // En cas d'erreur, annuler la transaction et afficher un message d'erreur
    $db->rollBack();
    echo "Erreur : " . $e->getMessage();
}
}


?>