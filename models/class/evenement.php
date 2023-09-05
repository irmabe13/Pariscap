<?php
require_once("lieu.php");
Class Evenement {

    public $id;
    public $titre;
    public $description;
    public $prix;
    public $date_debut;
    public $date_fin;
    public $lieu;

    public function __construct(int $id, string $titre, string $description, float $prix, string $date_debut , string $date_fin, Lieu $lieu) {
        
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->lieu = $lieu;

    }

    public function get_id(): int {

        return $this->id;

    }

    public function set_id(int $id) {
        
        $this->id = $id;

    }

    public function get_titre() {
        
        return $this->titre;

    }

    public function set_titre(string $titre) {

        $this->titre = $titre;

    }

    public function get_description() {

        return $this->description;

    }

    public function set_description(string $description) {

        $this->description = $description;

    }

    public function get_prix() : float {

        return $this->prix;

    }

    public function set_prix($unPrix) {
        
        $this->prix = $unPrix;

    }

    public function get_date_debut() {

        return $this->date_debut;

    }

    public function set_date_debut($une_date) {

        $this->date_debut = $une_date;

    }

    public function get_date_fin() {

        return $this->date_fin;

    }

    public function set_date_fin($une_date) {

        $this->date_fin = $une_date;

    }

    public function get_lieu() {

        return $this->lieu;

    }

    public function set_lieu($un_lieu) {

        $this->lieu = $un_lieu;

    }

}
?>