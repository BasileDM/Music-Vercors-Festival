<?php
require_once './src/classes/Database.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Montserrat:ital,wght@0,100..900;1,100..900&family=PT+Sans+Narrow:wght@400;700&display=swap" rel="stylesheet">
  <title>Formulaire de réservation Music Vercos Festival</title>
</head>

<body>
<?php

include './includes/header.php';

echo '<p>Votre réservation a bien été prise en compte.<br>
    Merci de votre confiance ! <br></p>';
    

echo '<p>Votre réservation:<br> Pour ' . $_GET['nbPersonnes'] . ' personne(s).<br>
    Nom : ' . $_GET['nom'] . '<br>
    Prenom : ' . $_GET['prenom'] . '<br></p>';

switch ($_GET['date']) {
    case 'choixJour1':
        echo '<p>Date : Pass un jour, pour la journée du 01/07</p>';
        break;
    case 'choixJour2':
        echo '<p>Date : Pass un jour, pour la journée du 02/07</p>';
        break;
    case 'choixJour3':
        echo '<p>Date : Pass un jour, pour la journée du 03/07</p>';
        break;
    case 'choixJour12':
        echo '<p>Date : Pass deux jours, pour les journées du 01/07 au 02/07</p>';
        break;
    case 'choixJour23':
        echo '<p>Date : Pass deux jours, pour les journées du 02/07 au 03/07</p>';
        break;
    case 'pass3jours':
        echo '<p>Date : Pass trois jours du 01/07 au 03/07</p>';
        break;
}

echo '<p>Vous avez réservé ' . $_GET['nbCasquesEnfants'] . " casques pour enfants<br>
Vous avez réservé " . $_GET['nbLugesEte'] . ' descentes de luges<br></p>';

echo '<p>Prix Total : ' . $_GET['prixTotal'] . '€<br></p>';
?>
</body>
</html>