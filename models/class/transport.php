<?php
class Transport {

    public $id;
    public $type; // 1 : Bus - 2 : Métropolitain - 3 : RER (Réseau Express Régional) - 4. T ramway
    public $ligne;
    public $arret;
    public $lieux = [];

    function __construct($id, $type, $ligne, $arret) {

        $this->id = $id;
        $this->type = $type;
        $this->ligne = $ligne;
        $this->arret = $arret;

    }

    function get_id(): int {

        return $this->id;

    }

    function set_id(int $id): void {

        $this->id = $id;

    }

    function get_type(): string {

        return $this->type;

    }

    function set_type(string $type) {

        $this->type = $type;

    }

    function get_ligne() {

        return $this->ligne;

    }

    function set_ligne(int $ligne) {

        $this->ligne = $ligne;

    }

    function get_arret() {

        return $this->arret;

    }

    function set_arret(string $arret) {
        
        $this->arret = $arret;

    }

    function add_lieu(Lieu $lieu) {

        if (in_array($lieu, $this->lieux)) {

            array_push($this->lieu, $lieu);
            
        }

    }

    function remove_lieu(Lieu $lieu) {

        $index = array_search($lieu, $this->lieu);

        if ($index) {

            unset($this->lieux[$index]);

        }

    }

}
?>