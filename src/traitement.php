<?php

require './config.php';
require 'classes/Database.php';

if(isset($_POST['nombrePlaces']) && 
isset($_POST['nombreCasquesEnfants']) && 
// add stock after (42)
isset($_POST['NombreLugesEte']) && 
isset($_POST['nom']) && 
isset($_POST['prenom']) && 
isset($_POST['email']) && 
isset($_POST['telephone']) && 
isset($_POST['adressePostale'])) {

    if(filter_var($_POST['nombrePlaces'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 1, "max_range"=> 99))) === false){
        $nombrePlaces = ($_POST['nombrePlaces']);
    } else {
            header('location:../index.php?error='.ERROR_NUMBER_OF_PLACES);
    }

    if(filter_var($_POST['nombreCasquesEnfants'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 1, "max_range"=> 99))) === false){
        $nombreCasquesEnfants = ($_POST['nombreCasquesEnfants']);
    } else {
        header('location:../index.php?error='.ERROR_NUMBER_OF_HEADPHONES);
    }

    if(filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $nom = ($_POST['nom']);
    } else {
        header('location:../index.php?error='.ERROR_EMPTY_FIELD);
    }

    if(filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $prenom = ($_POST['prenom']);
    } else {
        header('location:../index.php?error='.ERROR_EMPTY_FIELD);
    }

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        header('location:../index.php?error='.ERROR_EMAIL);
    }

    if(filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT)) {
        $telephone = $_POST['telephone'];
    }else {
        header('location:../index.php?error='.ERROR_PHONE);
    }

    if(filter_var($_POST['adressePostale'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
        $adressePostale = $_POST['adressePostale'];
    }else {
        header('location:../index.php?error='.ERROR_ADDRESS);
    }
    };

var_dump($nom);


?>