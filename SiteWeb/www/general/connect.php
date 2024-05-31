<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "root";
$database = "sae";

try {
    $db = new PDO("mysql:host=localhost:$port;dbname=$database", $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die("Erreur : Connexion impossible à la base de données");
}
?>