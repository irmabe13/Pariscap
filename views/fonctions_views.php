<?php
function afficherMenu()
{
    $current_page = $_GET['s'];
    $menu_navigation = ['Accueil', 'Lieux', 'Evenement', 'Contact'];
    echo ("<div class='navlinks-container'>");
    foreach ($menu_navigation as $nav_links) {
        if ($current_page == strtolower($nav_links)) {
            echo ("<a href='?s=" . strtolower($nav_links) . "' aria-current='page'><strong>" . $nav_links . "</strong></a>");
        } else {
            echo ("<a href='?s=" . strtolower($nav_links) . "' aria-current='page'>" . $nav_links . "</a>");
        }

    }
    echo ("</div>");
}
function afficherPlus(int $id_lieu)
{
    echo "<a class='plus' href='?s=lieu_" . $id_lieu . "' aria-current='page'>+</a>";
}


function afficherPlusEvent(int $id_event)
{
    echo "<a class='plus' href='?s=event&idE=" . $id_event . "' aria-current='page'>+</a>";
}


function caseEventHandler(int $eventId)
{
    require("models\config\config.php");

    $lesEvents = getEventsObjects();

    foreach ($lesEvents as $event) {
        if ($event->get_id() == $eventId) {
            echo "Titre de l'evenement : " . $event->get_titre() . "Description de l'evenement : " . $event->get_description() . "Prix de l'evenement : " . $event->get_prix() . " Date de début : " . $event->get_date_debut() . " Date de fin : " . $event->get_date_fin();
        }
    }
}

?>