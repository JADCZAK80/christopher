<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des variables du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["Prenom"];
    $email = $_POST["Email"];
    $telephone = $_POST["Telephone"];
    $demande = $_POST["demande"];

    // Création du nom de fichier avec la date complète
    $nomFichier = "TEXT/" .date("Y_m_d_h_i_s") . ".txt";

    // Contenu à écrire dans le fichier
    $contenu = "Nom: $nom\n";
    $contenu .= "Prénom: $prenom\n";
    $contenu .= "Email: $email\n";
    $contenu .= "Téléphone: $telephone\n";
    $contenu .= "Demande: $demande\n";

    // Écriture du contenu dans le fichier
    if (file_put_contents($nomFichier, $contenu)) {
        echo "Le fichier $nomFichier a été créé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la création du fichier.";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}
?>