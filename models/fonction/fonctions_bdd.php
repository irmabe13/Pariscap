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
        $courteDescription = $lieu['courte_description'];
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

        array_push($lesLieux, new Lieu($lieuId, $lieuNom, $lieuDescription, $courteDescription, $transportsId, $events, $lieuImage));

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
        $lieuCourteDescription = $lieu["courte_description"];
        $lieuNom = $lieu["nom"];
        $lieuDescription = $lieu['description'];
        $courteDescription = $lieu['courte_description'];
        $lieuImage = ['image'];

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

        $leLieu = new Lieu($lieuId, $lieuNom, $lieuDescription, $lieuCourteDescription, $transportsId, $events, $lieuImage);

    }

    return $leLieu;
}



function getTransportsObject(): array
{
    require("models/config/config.php");
    require("models/class/transport.php");

    $reqTransports = $db->query("SELECT * from transport");
    $lesTransports = [];

    foreach ($reqTransports->fetchAll() as $transport) {
        $transportId = $transport['id'];
        $transportLigne = $transport['ligne'];
        $transportArret = $transport['arret'];
        $array_transports = ["bus", "metro", "rer", "tram"];
        $transportType = $array_transports[$transport['type'] - 1];

        array_push($lesTransports, new Transport($transportId, $transportType, $transportLigne, $transportArret));

    }

    return $lesTransports;

}




function getEventsObjects()
{
    require("models/config/config.php");

    $reqEvents = $db->query("SELECT * FROM evenement");
    $lesEvents = [];

    foreach ($reqEvents->fetchAll() as $event) {
        $eventId = $event['id'];
        $eventTitre = $event['titre'];
        $eventDescription = $event['description'];
        $eventCourte_description = $event['courte_description'];
        $eventPrix = $event['prix'];
        $eventImage = $event['image'];
        $eventDateDeb = $event['datedebut'];
        $eventDateFin = $event['datefin'];
        $idLieu = $event['idlieu'];
        $eventLieu = getUnLieuObject($idLieu);


        array_push($lesEvents, new Evenement($eventId, $eventTitre, $eventDescription, $eventCourte_description, $eventPrix, $eventDateDeb, $eventDateFin, $eventLieu, $eventImage));
    }
    return $lesEvents;
}


function getEventsObjectsFromLieu(int $idLieu)
{
    require("models/config/config.php");

    $reqEvents = $db->query("SELECT * FROM evenement WHERE idlieu = $idLieu ");
    $lesEvents = [];

    foreach ($reqEvents->fetchAll() as $event) {
        $eventId = $event['id'];
        $eventTitre = $event['titre'];
        $eventDescription = $event['description'];
        $eventCourte_description = $event['courte_description'];
        $eventPrix = $event['prix'];
        $eventImage = $event['image'];

        $eventDateDeb = $event['datedebut'];
        $eventDateFin = $event['datefin'];
        $idLieu = $event['idlieu'];
        $eventLieu = getUnLieuObject($idLieu);


        array_push($lesEvents, new Evenement($eventId, $eventTitre, $eventDescription, $eventCourte_description, $eventPrix, $eventDateDeb, $eventDateFin, $eventLieu, $eventImage));
    }
    return $lesEvents;
}


function get_transports($id_lieu, $transports)
{
    require("models/config/config.php");
    $reqDesserte = "SELECT idtransport FROM desservir WHERE idlieu = $id_lieu";
    $dessertes = $db->query($reqDesserte);
    print_r($transports);
    foreach ($dessertes->fetchAll() as $desserte) {
        echo ($desserte['idtransport']);
    }
}

function getTransports($id_lieu)
{
    require("models/config/config.php");

    $reqDesserte = "SELECT idtransport FROM desservir WHERE idlieu = $id_lieu";
    $dessertes = $db->query($reqDesserte);
    $les_dessertes = [];
    foreach ($dessertes->fetchAll() as $desserte) {
        array_push($les_dessertes, $desserte['idtransport']);
    }
    return $les_dessertes;
}

function eventsHTML(string $class): array
{
    require("models/config/config.php");
    $lesEvents = getEventsObjects();
    $array_events = [];
    foreach ($lesEvents as $event) {
        $un_event = "<div class='" . $class . "' id='" . $event->get_id() . "'>";
        $un_event .= "<h2 class='nom-event'>" . $event->get_titre() . "</h2>" . "<img class='lieu-image' src='public/images/events/" . $event->get_image() . "'>" . "<p class='courte-description'>" . $event->get_courte_description() . "</p>";
        $un_event .= afficherPlusEvent($event->get_id());
        $un_event .= "</div>";
        array_push($array_events, $un_event);
    }
    return $array_events;
}

?>