<?php
class Personnage {
    private $nom;
    private $prenom;
    private $age;
    private $sexe;

    public function __construct($nom, $prenom, $age, $sexe) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->sexe = $sexe;
    }

    // Ajoutez des accesseurs (getters) pour permettre l'accès aux attributs privés

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAge() {
        return $this->age;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function __toString() {
        return "Nom : " . $this->getNom() . "<br> Prénom : " . $this->getPrenom();
    }
    
}
?>
