<?php
$username = "cdc";
$password = "cdc";

try {
    $db = new PDO("pgsql:host=192.168.222.86;port=5432;dbname=pariscap;", $username, $password);
} catch (PDOException $e) {
    print("Erreur connexion " . $e->getMessage());
}

?>