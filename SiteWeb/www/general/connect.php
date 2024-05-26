<?php
$connect = mysqli_connect("localhost","root","root","sae");
$connect -> set_charset("utf8");
if(!$connect) die('Erreur : Connexion impossible à la base de donnes');
?>