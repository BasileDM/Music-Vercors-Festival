<?php

require './config.php';
require 'classes/Database.php';

if(isset($_POST['nombrePlaces']) && 
isset($_POST['nombreCasquesEnfants']) && 
isset($_POST['NombreLugesEte']) && 
isset($_POST['nom']) && 
isset($_POST['prenom']) && 
isset($_POST['email']) && 
isset($_POST['telephone']) && 
isset($_POST['adressePostale'])) {

if(filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $nom = ($_POST['nom']);
} else {
    header('location:../index.php?error='.ERROR_EMPTY_FIELD);
}

if(filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $nom = ($_POST['prenom']);
} else {

}


if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = htmlspecialchars($_POST['email']);
} else {

}

// need to add errors 

if(filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT)) {
    $telephone = $_POST['telephone'];
}else {

}
// CHECK THIS IS CORRECT FOR ADRESSES
if(filter_var($_POST['adressePostale'], FILTER_VALIDATE_INT)) {
    $adressePostale = $_POST['adressePostale'];

}
};


var_dump($_POST);


?>