<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="icon" href="" />
</head>

<body>
    <header>
    </header>

    <main>
        <?php
        require('models/dbconfig.php');
        switch (@$_GET['s']) {
            default:
                // include 'views/home.html';
                $reqLieu = $db->query("SELECT * FROM lieu ");
                while ($ligne = $reqLieu->fetch()) {
                    print("<li>" . "Lieu : " . $ligne['nom'] . "</li>");

                }
                ;
                break;
        }

        if (@$_GET['s'] != "home" and @$_GET['s'] != null) {
            echo "<a href='?s=home'>Page d'accueil</a>";
        }


        ?>

    </main>

    <footer>

    </footer>
</body>

</html>