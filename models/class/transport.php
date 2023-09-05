<?php
// require("lieu.php");
class Transport
{

    public $id;
    public $type; // 1 : Bus - 2 : Métropolitain - 3 : RER (Réseau Express Régional) - 4. T ramway
    public $ligne;
    public $arret;
    public $lieux = [];

    public function __construct($id, $type, $ligne, $arret)
    {

        $this->id = $id;
        $this->type = $type;
        $this->ligne = $ligne;
        $this->arret = $arret;

    }

    public function get_id(): int
    {

        return $this->id;

    }

    public function set_id(int $id): void
    {

        $this->id = $id;

    }

    public function get_type(): string
    {

        return $this->type;

    }

    public function set_type(string $type)
    {

        $this->type = $type;

    }

    public function get_ligne()
    {

        return $this->ligne;

    }

    public function set_ligne(int $ligne)
    {

        $this->ligne = $ligne;

    }

    public function get_arret()
    {

        return $this->arret;

    }

    public function set_arret(string $arret)
    {

        $this->arret = $arret;

    }

    public function add_lieu(Lieu $lieu)
    {

        if (in_array($lieu, $this->lieux)) {

            array_push($this->lieux, $lieu);

        }

    }

    public function remove_lieu(Lieu $lieu)
    {

        $index = array_search($lieu, $this->lieux);

        if ($index) {

            unset($this->lieux[$index]);

        }

    }

}

$transport = new Transport(1, 3, "A", "Nation");



assert($transport->get_id() == 1);
$transport->set_id(5);
assert($transport->get_id() == 5);
assert($transport->get_type() == 3);
$transport->set_type(6);
assert($transport->get_type() == 6);
assert($transport->get_ligne() == "A");
$transport->set_ligne("D");
assert($transport->get_ligne() == "D");
assert($transport->get_arret() == "Nation");
$transport->set_arret("Invalides");
assert($transport->get_arret() == "Invalides");

?>