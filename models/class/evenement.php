<?php
require("lieu.php")
class Evenement {

    public $id;
    public $titre;
    public $description;
    public $prix;
    public $date_debut;
    public $date_fin;
    public $lieu;

    public function __construct(int $id, string $titre, string $description, float $prix, string $date_debut , string $date_fin, Lieu $lieu);
}
?>