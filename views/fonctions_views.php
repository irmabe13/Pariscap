<?php
function afficherMenu()
{
    if (isset($_GET['s'])) {
        $current_page = $_GET['s'];
    } else {
        $current_page = "";
    }
    ;
    $menu_navigation = ['Accueil', 'Lieux', 'Evenement', 'Contact'];
    echo ("<div class='navlinks-container'>");
    foreach ($menu_navigation as $nav_links) {
        if ($current_page == strtolower($nav_links)) {
            echo ("<a href='?s=" . strtolower($nav_links) . "' aria-current='page'><strong>" . $nav_links . "</strong></a>");
        } else {
            echo ("<a href='?s=" . strtolower($nav_links) . "' aria-current='page'>" . $nav_links . "</a>");
        }

    }
    echo "<input type='search' id='search-bar'>";
    echo ("</div>");
}
function afficherPlus(int $id_lieu): string
{
    return "<a class='plus' href='?s=lieu&idL=" . $id_lieu . "' aria-current='page'>+</a>";
}


function afficherPlusEvent(int $id_event): string
{
    return "<a class='plus' href='?s=event&idE=" . $id_event . "' aria-current='page'>+</a>";
}

function Lieux_HTML()
{
    require("models\config\config.php");
    $lesLieux = getLieuxObject();

    $array_lieux = [];

    foreach ($lesLieux as $lieu) {

        $lieux_html = "<div class='card-lieu'>";
        $lieux_html .= "<div class='card-lieu-inner'>";
        $lieux_html .= "<div class='card-lieu-front'>";
        $lieux_html .= "<h2 class='nom-lieu'>" . $lieu->get_nom() . "</h2>" . "<img class='lieu-image' src='public\images\\" . $lieu->get_image() . "'>";
        //afficherPlus($lieu->get_id());
        $lieux_html .= "</div>";
        $lieux_html .= "<div class='card-lieu-back'>";
        $lieux_html .= "<p class='courte-description'>" . "Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis!" . "</p>";
        $lieux_html .= afficherPlus($lieu->get_id());
        $lieux_html .= "</div>";
        $lieux_html .= "</div>";
        $lieux_html .= "</div>";
        $lieux_html .= "<br>";

        $array_lieux[$lieu->get_nom()] = $lieux_html;

    }

    // var_dump($reqDesservir->fetchAll(PDO::FETCH_ASSOC));
    return $array_lieux;
}

function displayLieux()
{
    echo ("<div class='cards-container' id='cards-container'>");
    foreach (lieux_HTML() as $lieu) {
        echo ($lieu);
    }
    echo ("</div>");
}

function displayEvents()
{
    require("models\config\config.php");
    $lesEvents = getEventsObjects();


    echo ("<div class='events-container'>");
    foreach ($lesEvents as $event) {
        echo ("<div class='card_event'>");
        echo "<h2 class='nom-event'>" . $event->get_titre() . "</h2>" . "<img class='event-image' src='public\images\\" . "'><p class='courte-description'>" . "Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti porro, eum nam ut vitae, itaque odit, quis maiores ab cupiditate aspernatur eveniet tempore error et! Id pariatur quisquam distinctio quo excepturi animi iure dolor impedit velit odit. Reprehenderit quis mollitia accusamus aliquid, libero delectus. Tempora ratione ut id et omnis!" . "</p>";
        afficherPlusEvent($event->get_id());
        echo ("</div>");
        echo "<br>";

    }
    echo ("</div>");
}

function displayLieu(int $id_lieu)
{
    require("models/config/config.php");
    echo ("<div class=monument-card>");
    $les_transports = getTransportsObject();
    $lesEvents = getEventsObjectsFromLieu($id_lieu);
    $les_lieux = getLieuxObject();

    foreach ($les_lieux as $lieu) {
        if ($lieu->get_id() == $id_lieu) {
            echo ("<h2 class='nom-monument'>" . $lieu->get_nom() . "</h2>");
            echo ("<img class='image-monument' src='public/images/" . $lieu->get_image() . "'></img>");
            echo ("<p class='description'>" . $lieu->get_description() . "</p>");
            $reqDesserte = "SELECT idtransport FROM desservir WHERE idlieu = $id_lieu";
            $dessertes = $db->query($reqDesserte);
            $les_dessertes = [];
            foreach ($dessertes->fetchAll() as $desserte) {
                array_push($les_dessertes, $desserte['idtransport']);
            }
            foreach ($les_transports as $transport) {
                if (in_array($transport->get_id(), $les_dessertes)) {
                    echo ("<img class='logo-ratp' src='public/images/transports/" . $transport->get_type() . ".jpg'>");
                    echo ("<img class='numero-ligne' src='public/images/transports/ligne_" . $transport->get_ligne() . ".jpg'>");
                    echo ($transport->get_arret());
                }
            }

            foreach ($lesEvents as $event) {
                echo "<br>";
                echo "<b> Evenements ici : ";
                echo $event->get_titre();
                echo '<a href="?s=event&idE=' . $event->get_id() . '"> <input type="submit" value="Detail de l\'evenement" /> </a>';

            }
        }
    }
    echo ("</div>");


}
function caseEventHandler(int $eventId)
{
    require("models\config\config.php");

    $lesEvents = getEventsObjects();

    foreach ($lesEvents as $event) {
        if ($event->get_id() == $eventId) {
            echo "Titre de l'evenement : " . $event->get_titre() . "Description de l'evenement : " . $event->get_description() . "Prix de l'evenement : " . $event->get_prix() . " Date de début : " . $event->get_date_debut() . " Date de fin : " . $event->get_date_fin();
            echo '<a href="?s=lieu&idL=' . $event->get_lieu()->get_id() . '"> <input type="submit" value="Detail du lieu" /> </a>';


        }
    }
}

?>