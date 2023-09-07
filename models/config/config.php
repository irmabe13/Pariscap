<?php
$username = "cdc";
$password = "cdc";

try {
    $db = new PDO("pgsql:host=195.221.64.108;port=5432;dbname=pariscap;", $username, $password);
} catch (PDOException $e) {
    print("Erreur connexion " . $e->getMessage());
}

?>