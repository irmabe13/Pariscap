<?php
require_once('evenement.php');
class Lieu
{

    public $id;
    public $nom;
    public $description;
    public $courte_description;
    public $transports;
    public $evenements;
    public $image;

    public function __construct($id, $nom, $description, $courte_description, $transports, $evenements, $image)
    {

        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->courte_description = $courte_description;
        $this->transports = $transports;
        $this->evenements = $evenements;
        $this->image = $image;

    }

    public function get_id(): int
    {

        return $this->id;

    }

    public function set_id($unId)
    {

        $this->id = $unId;

    }


    public function get_image(): string
    {
        return $this->image;
    }

    public function get_nom(): string
    {

        return $this->nom;

    }

    public function set_nom($unNom)
    {

        $this->nom = $unNom;

    }

    public function get_description(): string
    {

        return $this->description;

    }

    public function set_description($uneDescription)
    {

        $this->description = $uneDescription;

    }

    public function get_courtedescription(): string
    {
        return $this->courte_description;
    }

    public function set_courtedescription($uneCourteDescription)
    {
        $this->courte_description = $uneCourteDescription;
    }

    public function get_transports(): array
    {

        return $this->transports;

    }

    public function add_transport($unTransport)
    {
        if (in_array($unTransport, $this->transports)) {

            array_push($this->transports, $unTransport);

        }

    }

    public function remove_transport($unTransport)
    {

        $index = array_search($unTransport, $this->transports);
        if ($index) {
            unset($this->transports[$unTransport]);
        }

    }

    public function get_evenements(): array
    {

        return $this->evenements;

    }

    public function add_evenement($unEvenement)
    {

        if (in_array($unEvenement, $this->evenements)) {

            array_push($this->evenements, $unEvenement);

        }

    }

    public function remove_evenement($unEvenement)
    {

        $index = array_search($unEvenement, $this->evenements);

        if ($index) {

            unset($this->evenements[$unEvenement]);

        }

    }
}

// $lieu = new Lieu(6, "Tour eiffel", "créé en 1889...", $transport, $evenement, "image");
// $evenement = new Evenement(1, "Découverte de la tour Eiffel", "Venez découvrir la Tour Eiffel", 100, "2023-09-01", "2023-09-01", $lieu);
// $transport = new Transport(1, 3, "A", "Nation");

// $nb_evenement = sizeof($lieu->get_evenements());
// $lieu->add_evenement($evenement);
// assert(sizeof($lieu->get_evenements()) == $nb_evenement + 1);
// $lieu->remove_evenement($evenement);
// assert(sizeof($lieu->get_evenements()) == $nb_evenement - 1);

// $nb_transport = sizeof($lieu->get_transports());
// $lieu->add_transport($transport);
// assert(sizeof($lieu->get_transports()) == $nb_transport + 1);
// $lieu->remove_transport($transport);
// assert($lieu->get_transports() == $nb_transport - 1);

// assert($lieu->get_description() == "crée en 1889...");
// $lieu->set_description("par Gustave E");
// assert($lieu->get_description() == "par Gustave E");
// assert($lieu->get_evenements() == $evenement);
// assert($lieu->get_id() == 6);
// $lieu->set_id(7);
// assert($lieu->get_id() == 7);
// assert($lieu->get_nom() == "Tour eiffel");
// assert($lieu->get_transports() == $transport);
?>