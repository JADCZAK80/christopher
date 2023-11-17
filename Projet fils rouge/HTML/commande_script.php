<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include 'DAO.php';    // Validation et échappement des données utilisateur (à ajouter)

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';
if (isset($_POST['submit_button'])) {

    $nom = $_POST['nom'];
    $mail_client = $_POST['mail'];
    $Téléphone = $_POST['Téléphone'];
    $adresse = $_POST['adresse'];
    $nombre = $_POST['nombre'];
    $prix = $_POST['prix'];
    $id_plat = $_POST['id_plat'];
    $dates = date('Y-m-d H:i:s');
    $total = $prix * $nombre;
    $total = number_format($total, 2, '.', '');
    $etat = "En préparation";
    $libelle = $_POST['libelle'];

// ...

try {
    // Démarrez la transaction
    $db->beginTransaction();

    // Utilisez une requête SQL pour mettre à jour la table commande
    $query = "INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) 
VALUES (:id_plat, :nombre, :total, :dates, :etat, :nom, :telephone_client, :mail, :adresse)";

    // Afficher la requête pour déboguer
    echo $query;

    $stmt = $db->prepare($query);

    // Liaison des paramètres avec les types appropriés
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':mail', $mail_client);
    $stmt->bindParam(':telephone_client', $Téléphone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_INT);
    $stmt->bindParam(':id_plat', $id_plat);
    $stmt->bindParam(':dates', $dates);
    $stmt->bindParam(':total', $total, PDO::PARAM_STR);
    $stmt->bindParam(':etat', $etat);

    // Exécution de la requête
    $stmt->execute();

    // Valider la transaction
    $db->commit();
    $mail = new PHPMailer(true);

    // On va utiliser le SMTP
    $mail->isSMTP();
    
    // On configure l'adresse du serveur SMTP
    $mail->Host       = 'localhost';    
    
    // On désactive l'authentification SMTP
    $mail->SMTPAuth   = false;    
    
    // On configure le port SMTP (MailHog)
    $mail->Port       = 1025;                                   
    
    // Expéditeur du mail - adresse mail + nom (facultatif)
    $mail->setFrom('from@thedistrict.com', 'The District Company');
    
    // Destinataire(s) - adresse et nom (facultatif)
    $mail->addAddress("client1@example.com", "Mr Client1");
    $mail->addAddress("client2@example.com"); 
    
    //Adresse de reply (facultatif)
    $mail->addReplyTo("reply@thedistrict.com", "Reply");
    
    //CC & BCC
    $mail->addCC("cc@example.com");
    $mail->addBCC("bcc@example.com");
    
    // On précise si l'on veut envoyer un email sous format HTML 
    $mail->isHTML(true);
    
    
    
    // Sujet du mail
    $mail->Subject = 'commande the_district';
    
    // Corps du message
    $mail->Body = "Commande réalisée avec succès {$nombre} {$libelle} pour un total de : {$total}";

    
    // On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
    if ($mail){
        try {
            $mail->send();
            echo 'Email envoyé avec succès';
            } catch (Exception $e) {
            echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
            }
        }
    //fin du mail
    // Redirection vers la page d'accueil
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    // En cas d'erreur, annuler la transaction et afficher un message d'erreur générique
    $db->rollBack();
    echo "Erreur PDO : " . $e->getMessage();
} catch (Exception $e) {
    // Capture des exceptions non capturées
    echo "Erreur inattendue : " . $e->getMessage();
}

// ...
}
?>
