<?php
require './src/classes/Database.php';

echo 'Votre réservation a bien été prise en compte.<br>
    Merci de votre confiance ! <br>
    Nom :' . $_GET['nom'] . '<br>
    Prix :' . $_GET['prixTotal'] . '<br>';