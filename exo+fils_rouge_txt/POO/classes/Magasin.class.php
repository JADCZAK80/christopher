<?php
class Magasin {
    private $nom;
    private $adresse;
    private $codePostal;
    private $ville;
    private $modeRestauration;

    public function __construct($nom, $adresse, $codePostal, $ville, $modeRestauration) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->modeRestauration = $modeRestauration;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getModeRestauration() {
        return $this->modeRestauration;
    }

    public function hasRestaurant() {
        return $this->modeRestauration === "Restaurant d'entreprise";
    }

    public function hasTicketsRestaurant() {
        return $this->modeRestauration === "Tickets restaurant";
    }
}
?>