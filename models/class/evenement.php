<?php
require("lieu.php");
class Evenement {

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

        return $this->description = $description;

    }

    public function set_description(string $description) {

        $this->description =  $description;

    }

    

}
?>