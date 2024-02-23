<?php

require './config.php';
require './classes/Database.php';
require './classes/Reservation.php';

if(isset($_POST['nombrePlaces']) && 
isset($_POST['nombreCasquesEnfants']) && 
// add stock after (42)
isset($_POST['NombreLugesEte']) && 
isset($_POST['nom']) && 
isset($_POST['prenom']) && 
isset($_POST['email']) && 
isset($_POST['telephone']) && 
isset($_POST['adressePostale'])) {

    $min = 1;
    $max = 99;

    if(filter_var($_POST['nombrePlaces'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)))){
        $nombrePlaces = ($_POST['nombrePlaces']);
        // echo("not good");
    } else {
            header('location:../index.php?error='.ERROR_NUMBER_OF_PLACES);
            // echo("good");
exit;
    }

    if(filter_var($_POST['nombreCasquesEnfants'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 0, "max_range"=> $max))) || $_POST['nombreCasquesEnfants'] === '0') {
        
        $nombreCasquesEnfants = ($_POST['nombreCasquesEnfants']);
        // echo("not good");
    } else {
        header('location:../index.php?error='.ERROR_NUMBER_OF_HEADPHONES);
                  // echo("good");
                  exit;

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

var_dump($_POST);

$prixTotal = 0;
// Checking pass selection cost
if(isset($_POST['tarifReduit'])) {
    if($_POST['passSelection'] === 'pass1jourreduit') {
        $prixTotal += 25;
    } elseif ($_POST['passSelection'] === 'pass2joursreduit') {
        $prixTotal += 50;
    } elseif ($_POST['passSelection'] === 'pass3joursreduit') {
        $prixTotal += 65;
    }
} elseif ($_POST['passSelection'] === 'pass1jour') {
    $prixTotal += 40;
} elseif ($_POST['passSelection'] === 'pass2jours') {
    $prixTotal += 70;
} elseif ($_POST['passSelection'] === 'pass3jours') {
    $prixTotal += 100;
}

// Checking tent cost
if (isset($_POST['tenteNuit1'])) {
    $prixTotal += 5;
}
if (isset($_POST['tenteNuit2'])) {
    $prixTotal += 5;
}
if (isset($_POST['tenteNuit3'])) {
    $prixTotal += 5;
}
if (isset($_POST['tente3Nuits'])) {
    $prixTotal += 12;
}

// Checking van cost
if (isset($_POST['vanNuit1'])) {
    $prixTotal += 5;
}
if (isset($_POST['vanNuit2'])) {
    $prixTotal += 5;
}
if (isset($_POST['vanNuit3'])) {
    $prixTotal += 5;
}
if (isset($_POST['van3Nuits'])) {
    $prixTotal += 12;
}

// Multiplying passes, tents and vans by number of people
$prixTotal *= $_POST['nombrePlaces'];

// Checking price of headphones and sleds
$prixTotal += $_POST['nombreCasquesEnfants'] * 2;
$prixTotal += $_POST['NombreLugesEte'] * 5;

// Setting date to the right value according to the pass selection
// 6 possible values : choixJour1, choixJour2, choixJour3, choixjour12, choixJour23, pass3jours
if ($_POST['passSelection'] === 'pass1jour') {
    $date = $_POST['pass1jour'];
} elseif ($_POST['passSelection'] === 'pass2jours') {
    $date = $_POST['pass2jours'];
} elseif ($_POST['passSelection'] === 'pass3jours') {
    $date = 'pass3jours';
} elseif ($_POST['passSelection'] === 'pass1jourreduit') {
    $date = $_POST['pass1jour'];
} elseif ($_POST['passSelection'] === 'pass2joursreduit') {
    $date = $_POST['pass2jours'];
} elseif ($_POST['passSelection'] === 'pass3joursreduit') {
    $date = 'pass3jours';
}

$newReservation = new Reservation(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['adressePostale'],
    $_POST['nombrePlaces'],
    $prixTotal,
    $date,
    $_POST['nombreCasquesEnfants'],
    $_POST['NombreLugesEte'],
    $_POST['tenteNuit1'] ?? null,
    $_POST['tenteNuit2'] ?? null,
    $_POST['tenteNuit3'] ?? null,
    $_POST['tente3Nuits'] ?? null,
    $_POST['vanNuit1'] ?? null,
    $_POST['vanNuit2'] ?? null,
    $_POST['vanNuit3'] ?? null,
    $_POST['van3Nuits'] ?? null
);

var_dump($newReservation);

$DB = new Database();
$retour = $DB->saveReservation($newReservation);

if ($retour) {
    header('location:../receipt.php?nom=' . $newReservation->getNom() . '&prixTotal=' . $newReservation->getPrixTotal());
    die;
} else {
    header('location:../index.php?error='.ERROR_DB);
}

?>