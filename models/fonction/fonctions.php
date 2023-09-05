<?php

function est_un_lieu(string $ref_page): bool
{

    return substr($ref_page, 0, 5) == "lieu_";

}

function displayLieux()
{
    require("models\config\config.php");
    $lesLieux = getLieuxObject();


    echo ("<div class='cards-container'>");
    foreach ($lesLieux as $lieu) {
        echo ("<div class='card_lieu'>");
        echo "<h2 class='nom-lieu'>" . $lieu->get_nom() . "</h2>" . "<img class='lieu-image' src='public\images\\" . $lieu->get_image() . "'><p class='courte-description'>" . "Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis!" . "</p>";
        afficherPlus($lieu->get_id());
        echo ("</div>");
        /*foreach ($reqDesservir->fetchAll(PDO::FETCH_ASSOC) as $idTransport) {
            $idTrans = $idTransport['idtransport'];

            array_push($transportIds, $idTrans);

            $reqTransports = $db->query("SELECT * FROM transport where id = $idTrans");
            foreach ($reqTransports->fetchAll(PDO::FETCH_ASSOC) as $transport) {
                $idTrans = $transport['id'];
                $arretTrans = $transport['arret'];
                echo " " . $idTrans . " à l'arrêt : " . $arretTrans;

            }

        }*/
        echo "<br>";

        // $lieu = new Lieu($lieu['id'], $lieu['nom'], $lieu['description']);

    }
    echo ("</div>");
    $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = 2");
    // var_dump($reqDesservir->fetchAll(PDO::FETCH_ASSOC));

}

function displayEvents()
{
    require("models\config\config.php");
    $lesEvents = getEventsObjects();


    echo ("<div class='cards-container'>");
    foreach ($lesEvents as $event) {
        echo ("<div class='card_lieu'>");
        echo "<h2 class='nom-lieu'>" . $event->get_titre() . "</h2>" . "<img class='lieu-image' src='public\images\\" . "'><p class='courte-description'>" . "Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis!" . "</p>";
        afficherPlusEvent($event->get_id());
        echo ("</div>");
        echo "<br>";

    }
    echo ("</div>");
}


assert(est_un_lieu("lieu_10"));
assert(!est_un_lieu("lieu0"));
assert(!est_un_lieu(12));
assert(!est_un_lieu(""));
assert(!est_un_lieu("lieu"))




    ?>