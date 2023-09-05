<?php

function getLieuxObject()
{
    require("models/config/config.php");
    $reqLieux = $db->query("SELECT * FROM lieu");
    $lesLieux = [];

    foreach ($reqLieux->fetchAll() as $lieu) {
        $transportsId = [];
        $events = [];
        $lieuId = $lieu["id"];
        $lieuNom = $lieu["nom"];
        $lieuDescription = $lieu['description'];
        $lieuImage = $lieu['image'];

        $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = $lieuId");
        $reqEvents = $db->query("SELECT * from evenement where idlieu = $lieuId ");


        // Récupérer les events pour chaque lieu
        foreach ($reqEvents->fetchAll() as $event) {
            array_push($events, $event);
        }


        // Récupérer les ID des lignes qui desservent le lieu
        foreach ($reqDesservir->fetchAll() as $idTransport) {
            $idTrans = $idTransport['idtransport'];

            array_push($transportsId, $idTrans);
        }

        array_push($lesLieux, new Lieu($lieuId, $lieuNom, $lieuDescription, $transportsId, $events, $lieuImage));

    }

    return $lesLieux;
}

function getUnLieuObject($idLieu)
{
    require("models/config/config.php");
    $reqLieux = $db->query("SELECT * FROM lieu where id = $idLieu");
    $lesLieux = [];

    foreach ($reqLieux->fetchAll() as $lieu) {
        $transportsId = [];
        $events = [];
        $lieuId = $lieu["id"];
        $lieuNom = $lieu["nom"];
        $lieuDescription = $lieu['description'];

        $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = $lieuId");
        $reqEvents = $db->query("SELECT * from evenement where idlieu = $lieuId ");


        // Récupérer les events pour chaque lieu
        foreach ($reqEvents->fetchAll() as $event) {
            array_push($events, $event);
        }


        // Récupérer les ID des lignes qui desservent le lieu
        foreach ($reqDesservir->fetchAll() as $idTransport) {
            $idTrans = $idTransport['idtransport'];

            array_push($transportsId, $idTrans);
        }

        $leLieu = new Lieu($lieuId, $lieuNom, $lieuDescription, $transportsId, $events);

    }

    return $leLieu;
}


function displayLieux(array $lesLieux)
{
    require("models/config/config.php");
    echo "<h2> Les Lieux </h2>";

    foreach ($lesLieux as $lieu) {

        echo "<b> Nom du Lieu : </b> " . $lieu->get_nom() . "<br>" . " <b> Description du lieu : </b>" . $lieu->get_description() . "<br>" . "<br>";
    }
}

function getTransportsObject()
{
    require("models/config/config.php");
    require("models/class/transport.php");

    $reqTransports = $db->query("SELECT * from transport");
    $lesTransports = [];

    foreach ($reqTransports->fetchAll() as $transport) {
        $transportId = $transport['id'];
        $transportLigne = $transport['ligne'];
        $transportArret = $transport['arret'];
        switch ($transport['type']) {
            case 1:
                $transportType = "bus";
                break;
            case 2:
                $transportType = "metro";
                break;
            case 3:
                $transportType = "rer";
                break;
            case 4:
                $transportType = "tram";
                break;

            default:
                break;
        }
        array_push($lesTransports, new Transport($transportId, $transportType, $transportLigne, $transportArret));

    }
    return $lesTransports;

}


function displayTransports(array $lesTransports)
{
    echo "<h2> Les transports </h2>";

    foreach ($lesTransports as $transport) {

        echo " <b> Nom de la ligne : </b> " . $transport->get_arret() . " <b> Numéro de la ligne : </b> " . $transport->get_ligne() . "<br>";
    }
}



function getEventsObjects()
{
    require("models/config/config.php");
    require("models/class/evenement.php");

    $reqEvents = $db->query("SELECT * FROM evenement");
    $lesEvents = [];

    foreach ($reqEvents->fetchAll() as $event) {
        $eventId = $event['id'];
        $eventTitre = $event['titre'];
        $eventDescription = $event['description'];
        $eventPrix = $event['prix'];
        $eventDateDeb = $event['datedebut'];
        $eventDateFin = $event['datefin'];
        $idLieu = $event['idlieu'];
        $eventLieu = getUnLieuObject($idLieu);


        array_push($lesEvents, new Evenement($eventId, $eventTitre, $eventDescription, $eventPrix, $eventDateDeb, $eventDateFin, $eventLieu));
    }
    return $lesEvents;
}

function displayEvents(array $lesEvents)
{
    foreach ($lesEvents as $event) {
        echo "<h2> Events </h2>";
        echo " <b> Nom de l'evenement : </b> " . $event->get_titre() . " <b> Description : </b> " . $event->get_description();
    }
}

?>