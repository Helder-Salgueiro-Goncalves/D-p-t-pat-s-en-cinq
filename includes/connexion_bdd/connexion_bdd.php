<?php

try {
    $dbname = "lyceestvincent_pzc";
    $host = "mysql-lyceestvincent.alwaysdata.net";
    $user = "116313_pzc";
    $mdp = "mdpPZC60";
    $connexion = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $user, $mdp);
} catch (Exception $e) {
    echo "Erreur de connexion.";
}
