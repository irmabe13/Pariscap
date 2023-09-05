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
            require('fonction\fonctions_views');
            afficherMenu();
            ?>
        </nav>
    </header>
    <main>

        <?php

        function afficherPlus(int $id_lieu) {
            echo "<a class='plus' href='?s=lieu_" . $id_lieu . "' aria-current='page'>+</a>";
        }
        require("models/config/config.php");
        require("models/class/lieu.php");
        require("models/fonctions.php");

        switch (@$_GET['s']) {
            case "home":
                echo("Page d'accueil");
                break;
            case "lieu":
<<<<<<< HEAD
                // while ($ligne = $reqLieu->fetch()) {
                //     print("<li>" . "Lieu : " . $ligne['nom'] . "</li>");
        
                // }
                $lesLieux = getLieuxObject();
                displayLieux($lesLieux);

                $lesTransports = getTransportsObject();
                displayTransports($lesTransports);

                $lesEvents = getEventsObjects();
                displayEvents($lesEvents);
=======
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
>>>>>>> e4bc1a52dbbdc58c7911cfbafa20dec4b6991f84




<<<<<<< HEAD
                // foreach ($reqLieux->fetchAll(PDO::FETCH_ASSOC) as $lieu) {
                //     $transportIds = [];
                //     $events = [];
                //     $lieuId = $lieu["id"];
                //     $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = $lieuId");
                //     echo "Le lieu : " . $lieu['nom'] . " est desservi par les lignes : ";
        
                //     $reqEvents = $db->query("SELECT * from evenement where idlieu = $lieuId ");
=======
                    }*/
                    echo "<br>";

                    // $lieu = new Lieu($lieu['id'], $lieu['nom'], $lieu['description']);
        
                }
                echo("</div>");
                $reqDesservir = $db->query("SELECT idtransport FROM desservir WHERE idlieu = 2");
                // var_dump($reqDesservir->fetchAll(PDO::FETCH_ASSOC));
>>>>>>> e4bc1a52dbbdc58c7911cfbafa20dec4b6991f84
        
                //     foreach ($reqEvents->fetchAll(PDO::FETCH_ASSOC) as $event) {
                //         array_push($event, $event);
                //     }
        
                //     foreach ($reqDesservir->fetchAll(PDO::FETCH_ASSOC) as $idTransport) {
                //         $idTrans = $idTransport['idtransport'];
        
                //         array_push($transportIds, $idTrans);
        
                //         $reqTransports = $db->query("SELECT * FROM transport where id = $idTrans");
                //         foreach ($reqTransports->fetchAll(PDO::FETCH_ASSOC) as $transport) {
                //             $idTrans = $transport['id'];
                //             $arretTrans = $transport['arret'];
                //             echo " " . $idTrans . " à l'arrêt : " . $arretTrans;
        
                //         }
        
                //     }
                //     echo "<br>";
        

                //     $lieu = new Lieu($lieu['id'], $lieu['nom'], $lieu['description'], $transportIds, $events);
        
                //     $lieux = $lieu->get_transports();
                //     foreach ($lieux as $lieu) {
                //         echo "," . $lieu;
                //     }
                // }
                // $lieu = new Lieu($lieu['id'], $lieu['nom'], $lieu['description']);
        





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