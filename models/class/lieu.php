<?php
require("transport.php");
Class Lieu {

    public $id;
    public $nom;
    public $description;
    public $transports;
    public $evenements;


    function __construct($id, $nom, $description, $transports, $evenements) {

        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->transports = $transports;
        $this->evenements = $evenements;

    }

    function getId(): int {

        return $this->id;

    }

    function setId($unId){

        $this->id = $unId;

    }

    function getNom(): string {

        return $this->nom;

    }

    function setNom($unNom) {

        $this->nom = $unNom;

    }

    function getDescription(): string {

        return $this->description;

    }

    function setDescription($uneDescription) {

        $this->description = $uneDescription;

    }

    function getTransports() : array {

        return $this->transports;

    }

    function addTransport($unTransport) {
        if (in_array($unTransport, $this->transports)) {

            array_push($this->transports, $unTransport);

        }

    }

    function removeTransport($unTransport) {

        $index = array_search($unTransport, $this->transports);

        if ($index) {

            unset($this->transports[$unTransport]);

        }

    }

    function getEvenements() : array {

        return $this->evenements;

    }

    function addEvenement($unEvenement) {

        if (in_array($unEvenement, $this->evenements)) {

            array_push($this->evenements, $unEvenement);

        }

    }

    function removeEvenement($unEvenement) {

        $index = array_search($unEvenement, $this->evenements);

        if ($index) {

            unset($this->evenements[$unEvenement]);

        }

    }
}

?>