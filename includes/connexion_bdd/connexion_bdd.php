<?php

try {
    $dbname = "lyceestvincent_pzc";
    $host = "localhost";
    $user = "root";
    $mdp = "";
    $connexion = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $user, $mdp);
} catch (Exception $e) {
    echo "Erreur de connexion.";
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "math_index";
