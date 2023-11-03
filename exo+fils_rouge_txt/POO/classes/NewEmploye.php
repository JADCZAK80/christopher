<?php

require 'Magasin.class.php'; // Inclure la classe Magasin
require 'Employe.class.php'; // Inclure la classe Employe

// Création de magasins
$magasin1 = new Magasin("Magasin A", "123 Rue de Paris", "75001", "Paris", "Restaurant d'entreprise");
$magasin2 = new Magasin("Magasin B", "456 Rue de Lyon", "69001", "Lyon", "Tickets restaurant");
$magasin3 = new Magasin("Magasin C", "789 Rue de Marseille", "13001", "Marseille", "Aucun");

// Création d'employés
$employe1 = new Employe("Dupont", "Jean", "2023-05-15", "Comptable", 45000, "Comptabilité", $magasin1);
$employe1->ajouterEnfant(8);
$employe1->ajouterEnfant(8);
$employe2 = new Employe("Martin", "Sophie", "2019-09-10", "Commercial", 50000, "Ventes", $magasin1);
$employe2->ajouterEnfant(12);
$employe3 = new Employe("Lefebvre", "Pierre", "2018-07-20", "Ingénieur", 60000, "R&D", $magasin2);
$employe3->ajouterEnfant(12);
$employe3->ajouterEnfant(8);
$employe3->ajouterEnfant(4);
$employe4 = new Employe("Girard", "Marie", "2017-03-02", "Chef de projet", 55000, "R&D", $magasin2);

$employe5 = new Employe("Moreau", "Paul", "2016-11-12", "Technicien", 42000, "Support", $magasin3);
$employe5->ajouterEnfant(8);

// Création du tableau contenant tous les employés
$employes = [$employe1, $employe2, $employe3, $employe4, $employe5];
$dateDuJour = new DateTime("2023-11-30");
// Affichage des informations des employés
foreach ($employes as $employe) {
    echo "Nom : " . $employe->getNom() . "<br>";
    echo "Prénom : " . $employe->getPrenom() . "<br>";
    echo "Salaire : " . $employe->getSalaire() . "<br>";
    echo "Poste : " . $employe->getPoste() . "<br>";
    echo "Service : " . $employe->getService() . "<br>";
    echo "Ancienneté : " . $employe->anneesDansEntreprise() . " ans<br>";
    // Vérifiez si la date du jour est le 30 novembre (jour de versement de la prime)
    if ($dateDuJour->format('m-d') == '11-30') {
        // Affichez un message indiquant que la prime a été versée à la banque avec le montant
        $montantPrime = $employe->calculerPrime();
        echo "L'ordre de transfert de la prime de {$employe->getNom()} {$employe->getPrenom()} d'un montant de $montantPrime K euros a été envoyé à la banque.<br>";
    } else {
        echo "Aucun versement de prime aujourd'hui pour {$employe->getNom()} {$employe->getPrenom()}.<br>";
    }
    // Affichage du mode de restauration du magasin
    echo "Mode de restauration du magasin : " . $employe->getMagasin()->getModeRestauration() . "<br>";

    // Vérification et affichage des droits aux chèques-vacances
    if ($employe->peutAvoirChequesVacances()) {
        echo "Droit aux chèques-vacances : Oui<br>";
    } else {
        echo "Droit aux chèques-vacances : Non<br>";
    }

    // Vérification et affichage des droits aux chèques Noël
   // Vérification et affichage des droits aux chèques Noël
if ($employe->peutAvoirChequesNoel()) {
    $montantTotalChequesNoel = $employe->obtenirMontantChequesNoel();
    echo "Droit aux chèques Noël : Oui<br>";
    echo "Montant total des chèques Noël : " . $montantTotalChequesNoel . " €<br><br><hr>";
} else {
    echo "Droit aux chèques Noël : Non<br><br><hr>";
}

}


?>
