<?php
session_start();
//1- recupération des données de la formulaire
$id = $_POST['idu'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$mp = $_POST['mp'];


//2- la chaîne de connexion
include "inc/function.php";
$conn = connect();

//3- Creation de la requête d'exécution
$requete = "UPDATE  visiteurs SET telephone = '$telephone', adresse = '$adresse', mp = '$mp' WHERE id='$id' ";


//4- Execution de la requête
$resultat = $conn->query($requete);
