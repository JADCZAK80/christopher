<?php
class Employe {
    private $nom;
    private $prenom;
    private $embauche;
    private $poste;
    private $salaire;
    private $service;
    private $magasin;
    private $enfants; // Tableau pour stocker l'âge des enfants

    public function __construct($nom, $prenom, $embauche, $poste, $salaire, $service, $magasin) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->embauche = $embauche;
        $this->poste = $poste;
        $this->salaire = $salaire;
        $this->service = $service;
        $this->magasin = $magasin;
        $this->enfants = [];
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmbauche() {
        return $this->embauche;
    }

    public function getPoste() {
        return $this->poste;
    }

    public function getSalaire() {
        return $this->salaire;
    }

    public function getService() {
        return $this->service;
    }

    public function getMagasin() {
        return $this->magasin;
    }

    public function getEnfants() {
        return $this->enfants;
    }

    public function anneesDansEntreprise() {
        $dateEmbauche = new DateTime($this->embauche);
        $dateActuelle = new DateTime();
        $difference = $dateActuelle->diff($dateEmbauche);

        return $difference->y;
    }

    public function calculerPrime() {
        $primeSalaire = $this->salaire * 0.05;
        $primeAnciennete = $this->salaire * ($this->anneesDansEntreprise() * 0.02);
        return $primeSalaire + $primeAnciennete;
    }

    public function peutAvoirChequesVacances() {
        return $this->anneesDansEntreprise() >= 1;
    }

    public function ajouterEnfant($age) {
        $this->enfants[] = $age;
    }

    public function peutAvoirChequesNoel() {
        foreach ($this->enfants as $age) {
            if ($age <= 10 || ($age >= 11 && $age <= 15) || ($age >= 16 && $age <= 18)) {
                return true;
            }
        }
        return false;
    }

    public function obtenirMontantChequesNoel() {
        $chequesNoel = [
            "0-10 ans" => 20,
            "11-15 ans" => 30,
            "16-18 ans" => 50,
        ];
    
        $montantTotal = 0;
    
        foreach ($this->enfants as $age) {
            foreach ($chequesNoel as $trancheAge => $montant) {
                list($min, $max) = array_map('intval', explode('-', str_replace(' ans', '', $trancheAge)));
                if ($age >= $min && $age <= $max) {
                    $montantTotal += $montant;
                }
            }
        }
    
        return $montantTotal;
    }
    
}
?>