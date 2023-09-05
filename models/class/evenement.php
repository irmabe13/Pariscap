<?php
require("lieu.php");;
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

$evenement = new Evenement(1,"Découverte de la tour Eiffel","Venez découvrir la Tour Eiffel",100,2023-09-01,2023-09-01,$lieu);
$lieu = new Lieu(6,"Tour eiffel","créé en 1889...",$transport,$evenement);
$lieu2 = new Lieu(6,"Tour eiffel","créé en 1889...",$transport,$evenement);

assert($evenement->get_id() == 1);
$evenement->set_id(3);
assert($evenement->get_id() == 3);

assert($evenement->get_titre() == "Découverte de la tour Eiffel");
$evenement->set_titre("tournage clip pnl");
assert($evenement->get_titre() == "tournage clip pnl");

assert($evenement->get_description() == "Venez découvrir la Tour Eiffel");
$evenement->set_description("venez participer au clip");
assert($evenement->get_description() == "venez participer au clip");

assert($evenement->get_prix() == 100);
$evenement->set_prix(50);
assert($evenement->get_prix() == 50);

assert($evenement->get_date_debut() == 2023-09-01);
$evenement->set_date_debut(2023-05-13);
assert($evenement->get_date_debut() == 2023-05-13);

assert($evenement->get_date_fin() == 2023-09-01);
$evenement->set_date_fin(2023-05-14);
assert($evenement->get_date_fin() == 2023-05-14);

assert($evenement->get_lieu() == $lieu);
$evenement->set_lieu($lieu2);
assert($evenement->get_lieu() == $lieu2);
?>