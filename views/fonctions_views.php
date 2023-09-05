<?php
function afficherMenu() {
    $current_page = $_GET['s'];
    $menu_navigation = ['Accueil', 'Lieu', 'Evenement', 'Contact'];
    echo("<div class='navlinks-container'>");
    echo("<a href='?s=home' aria-current='page'>Accueil</a>");
    echo("</div>");   
}
?>