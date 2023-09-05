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
                    <a href="?s=home" aria-current="page"<?php if ($_GET['s']=='home') echo 'class="current"'?>>Accueil</a>
                    <a href="?s=lieu">Lieu</a>
                    <a href="?s=evenement">Evenement</a>
                    <a href="?s=contact">Contact</a>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <main>

        <?php

        function afficherPlus(int $id_lieu) {
            echo "<a class='plus' href='?s=lieu_" . $id_lieu . "' aria-current='page'>+</a>";
        }
        function afficherNavMenu() {
            //$menu_navigation = ['']
            $cuurent_page = $_GET['s'];
        }
        require("models/config/config.php");
        require("models/class/lieu.php");
        switch (@$_GET['s']) {
            case "home":
                echo ("Page d'accueil");
                break;
            case "lieu":
                $reqLieux = $db->query("SELECT * FROM lieu");
                echo("<div class='cards-container'>");
                foreach ($reqLieux->fetchAll(PDO::FETCH_ASSOC) as $lieu) {
                    echo("<div class='card_lieu'>");
                    $lieuId = $lieu["id"];
                    $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = $lieuId");
                    echo "<h2 class='nom-lieu'>" . $lieu['nom'] . "</h2>" . "<img class='lieu-image' src='public\images\\" . $lieu['image'] . "'><p>" . $lieu['courte_description'] . "</p>";
                    afficherPlus($lieu['id']);
                    echo("</div>");
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
                echo("</div>");
                $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = 2");
                // var_dump($reqDesservir->fetchAll(PDO::FETCH_ASSOC));
        



                // var_dump($lieu);
                break;
            case "evenement":
                break;
            case "contact":
                break;
            case "lieu_10":

        }
        ?>



    </main>
    <footer>
    </footer>
    <script src="views\script\script.js"></script>
</body>

</html>