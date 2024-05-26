<?php
$connectdatabase = mysqli_connect("localhost","root","root");
$database = " CREATE DATABASE IF NOT EXISTS SAE";
mysqli_query($connectdatabase, $database);
$connect = mysqli_connect("localhost","root","root","SAE");

if(!$connect) die('Erreur : Connexion impossible à la base de donnes');

$Tables0 = "CREATE TABLE Formules (
    idFormule INTEGER(22),
    nomFormule VARCHAR(50) NOT NULL,
    imageFormule VARCHAR(500),
    prixFormule INTEGER DEFAULT 0,
    description VARCHAR(500)
)";

mysqli_query($connect, $Tables0);