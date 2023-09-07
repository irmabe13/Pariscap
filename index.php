<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="views\style\style.css">
    <link rel="icon" href="public/images/logo_tour_eiffel.jpg" />
</head>

<body>
    <header class="header">
        <nav>
            <a href="?s=accueil"><img class="logo" src="public\images\logo_tour_eiffel.png"></a>
            <div class="main-navlinks">
                <button type="button" class="hamburger open" aria-label="Toggle Navigation" aria-expanded="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <?php
            require('views/fonctions_views.php');
            include "views/menu.php"
                ?>
        </nav>
    </header>
    <main>

        <?php

        require("models/config/config.php");
        require("models/class/lieu.php");
        require("models/fonction/fonctions_bdd.php");

        switch (@$_GET['s']) {
            default:
                include "views/accueil.php";
                ?>
                <script>const event_html = <?php echo (json_encode(eventsHTML("card-event"))); ?></script>
                <?php
                break;
            case "accueil":
                include "views/accueil.php";
                ?>
                <script>const event_html = <?php echo (json_encode(eventsHTML("card-event"))); ?></script>
                <?php
                break;
            case "lieux":
                include "views/lieux.php";
                break;
            case "evenement":
                include "views/events.php";
                break;
            case "contact":
                break;
            case "lieu":
                //  displayLieu($_GET['idL']);
                include "views/lieu.php";
                break;
            case "search":
                include "views/search.php";
                break;
            case "event";
                // caseEventHandler($_GET['idE']);
                include "views/event.php";
                break;

        }
        ?>

        <script type="text/javascript">
            <?php
            $php_array_lieux = getLieuxObject();
            $php_array_events = getEventsObjects();

            $js_array_lieux = json_encode($php_array_lieux);
            $js_array_events = json_encode($php_array_events);
            echo "let lieuArray = " . $js_array_lieux . ";\n";
            echo "let eventsArray = " . $js_array_events . ";\n";
            ?>


        </script>

    </main>
    <footer>
    </footer>
    <script src="views\script\script.js"></script>
</body>

</html>