<?php
/*require("transport.php");*/
Class Lieu {

    public $id;
    public $nom;
    public $description;
    public $transports;
    public $evenements;


    public function __construct($id, $nom, $description, $transports, $evenements) {

        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->transports = $transports;
        $this->evenements = $evenements;

    }

    public function get_id(): int {

        return $this->id;

    }

    public function set_id($unId){

        $this->id = $unId;

    }

    public function get_nom(): string {

        return $this->nom;

    }

    public function set_nom($unNom) {

        $this->nom = $unNom;

    }

    public function get_description(): string {

        return $this->description;

    }

    public function set_description($uneDescription) {

        $this->description = $uneDescription;

    }

    public function get_transports() : array {

        return $this->transports;

    }

    public function add_transport($unTransport) {
        if (in_array($unTransport, $this->transports)) {

            array_push($this->transports, $unTransport);

        }

    }

    public function remove_transport($unTransport) {

        $index = array_search($unTransport, $this->transports);
        if ($index) {
            unset($this->transports[$unTransport]);
        }

    }

    public function get_evenements() : array {

        return $this->evenements;

    }

    public function add_evenement($unEvenement) {

        if (in_array($unEvenement, $this->evenements)) {

            array_push($this->evenements, $unEvenement);

        }

    }

    public function remove_evenement($unEvenement) {

        $index = array_search($unEvenement, $this->evenements);

        if ($index) {

            unset($this->evenements[$unEvenement]);

        }

    }
}

?>