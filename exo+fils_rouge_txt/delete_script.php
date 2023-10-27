<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=record', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

if (isset($_POST['delete_button'])) {
    // Validation et échappement des données utilisateur (à ajouter)


    $numero = $_POST['disc_id'];

        
        try {
            // Démarrez la transaction
            $db->beginTransaction();
        // Utilisez une requête SQL pour mettre à jour l'enregistrement
        $query = "DELETE FROM disc 
                  WHERE disc_id = :disc_id";

        $stmt = $db->prepare($query);

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