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
                    <div class="navlinks-container open" style="transition: transform 0.4s ease-out 0s;">
                        <a href="#" aria-current="page">Accueil</a>
                        <a href="#">Lieu</a>
                        <a href="#">Evenement</a>
                        <a href="#">Contact</a>
                    </div>
                </div>
            </nav>
        </header>
        <main>
        
            <?php
            
            require("models\config\config.php");
            switch (@$_GET['s']) {
                default:
                    // include 'views/home.html';
                    $reqLieu = $db->query("SELECT * FROM lieu ");
                    while ($ligne = $reqLieu->fetch()) {
                        print("<li>" . "Lieu : " . $ligne['nom'] . "</li>");

                    }
                    break;
            }

            if (@$_GET['s'] != "home" and @$_GET['s'] != null) {
                echo "<a href='?s=home'>Page d'accueil</a>";
            }
            ?>

        </main>
        <footer>
        </footer>
        <script src="views\script\script.js"></script>
    </body>
</html>