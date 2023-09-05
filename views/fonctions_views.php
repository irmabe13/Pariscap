<?php
function afficherMenu() {
    $current_page = $_GET['s'];
    $menu_navigation = ['Accueil', 'Lieu', 'Evenement', 'Contact'];
    echo("<div class='navlinks-container'>");
    foreach ($menu_navigation as $nav_links) {
        if ($current_page == strtolower($nav_links)) {
            echo("<a href='?s=" . strtolower($nav_links) . "' aria-current='page'><strong>" . $nav_links . "</strong></a>");
        }
        else {
            echo("<a href='?s=" . strtolower($nav_links) . "' aria-current='page'>" . $nav_links . "</a>");
        }
        
    }
    echo("</div>");   
}
?>