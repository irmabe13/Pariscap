<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pariscap</title>
    <link rel="stylesheet" href="views/style/style.css">
    <link rel="icon" href="public/images/logo_tour_eiffel.jpg">
</head>

<body>
    <?php
    include "views/header.php";
    ?>
    <main>

        <?php

        require('views/fonctions_views.php');

        require("models/config/config.php");
        require("models/class/lieu.php");
        require("models/fonction/fonctions_bdd.php");
        if (isset($_GET['s'])) {
            switch (@$_GET['s']) {
                default:
                    include "views/accueil.php";
                    break;
                case "accueil": ?>
                    <script>
                        const event_html = <?php echo (json_encode(eventsHTML("card-event"))); ?>
                    </script>
                    <?php
                    include "views/accueil.php";
                    break;
                case "lieux":
                    include "views/lieux.php";
                    break;
                case "evenement":
                    include "views/events.php";
                    break;
                case "contact":
                    include "views/contact.php";
                    break;
                case "lieu":
                    include "views/lieu.php";
                    break;
                case "search":
                    include "views/search.php";
                    break;
                case "event";
                    include "views/event.php";
                    break;
            }
        }
        ?>

    </main>
    <footer>
    </footer>
    <script src="views/script/script.js"></script>
</body>

</html>