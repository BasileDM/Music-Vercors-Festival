<?php
require './src/classes/Database.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./assets/form-field-checker.js" defer></script>
  <script src="../assets/section-display.js" defer></script>
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
    Merci de votre confiance ! <br>
    Nom :' . $_GET['nom'] . '<br>
    Prix Total :' . $_GET['prixTotal'] . '€<br></p>';

switch ($_GET['date']) {
    case 'choixJour1':
        echo '<p>Date : Le premier juillet</p>';
        break;
    case 'choixJour2':
        echo '<p>Date : Le deux juillet</p>';
        break;
    case 'choixJour3':
        echo '<p>Date : Le trois juillet</p>';
        break;
    case 'choixjour12':
        echo '<p>Date : Les deux journées du 01/07 au 02/07</p>';
        break;
    case 'choixJour23':
        echo '<p>Date : Les deux journées du 02/07 au 03/07</p>';
        break;
    case 'pass3jours':
        echo '<p>Date : Les trois journées du 01/07 au 03/07</p>';
        break;
}
?>
</body>
</html>