<?php

require 'classes/Database.php';

if(isset($_POST['nombrePlaces']) && 
isset($_POST['nombreCasquesEnfants']) && 
isset($_POST['NombreLugesEte']) && 
isset($_POST['nom']) && 
isset($_POST['prenom']) && 
isset($_POST['email']) && 
isset($_POST['telephone']) && 
isset($_POST['adressePostale'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);


if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = htmlspecialchars($_POST['email']);
}

if(filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT)) {
    $telephone = $_POST['telephone'];
}

if()
};


var_dump($_POST['soumission']);


?>