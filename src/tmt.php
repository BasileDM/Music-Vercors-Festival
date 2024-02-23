<?php
require './classes/Database.php';
require './classes/Reservation.php';

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

echo $prixTotal;

new Reservation(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['adressePostale'],
    $_POST['passSelection'],
    $_POST['tenteNuit1'],
    $_POST['tenteNuit2'],
    $_POST['tenteNuit3'],
    $_POST['tente3Nuits'],
    $_POST['vanNuit1'],
    $_POST['vanNuit2'],
    $_POST['vanNuit3'],
    $_POST['van3Nuits'],
    $_POST['nombrePlaces'],
    $_POST['nombreCasquesEnfants'],
    $_POST['NombreLugesEte'],
    $prixTotal
);

?>