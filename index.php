<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="views\style\style.css">
    <link rel="icon" href="" />
</head>

<body>
    <header class="header">
        <nav>
            <img class="logo" src="public\images\logo_tour_eiffel.jpg">
            <div class="main-navlinks">
                <button type="button" class="hamburger open" aria-label="Toggle Navigation" aria-expanded="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <?php
            require('views/fonctions_views.php');
            afficherMenu();
            ?>
        </nav>
    </header>
    <main>

        <?php
        require("models/config/config.php");
        require("models/class/lieu.php");
        require("models/fonction/fonctions_bdd.php");
        require("models/fonction/fonctions.php");


        switch (@$_GET['s']) {
            case "home":
                echo ("Page d'accueil");
                break;
            case "lieux":
                displayLieux();
                break;
            case "evenement":
                displayEvents();
                break;
            case "contact":
                break;
            case "lieu":
                break;
            case "event";
                caseEventHandler($_GET['idE']);
                break;
                echo ("<div class=monument-card>");
                $les_lieux = getLieuxObject();
                foreach ($les_lieux as $lieu) {
                    if ($lieu->get_id() == $_GET['idL']) {
                        echo ("<h2 class='nom-monument'>" . $lieu->get_nom() . "</h2>");
                        echo ("<img class='image-monument' src='public/images/" . $lieu->get_image() . "'></img>");
                        echo ("<p class='description'>" . $lieu->get_description() . "</p>");
                    }
                }
                echo ("</div>");
                break;

        }
        ?>



    </main>
    <footer>
    </footer>
    <script src="views\script\script.js"></script>
</body>

</html>