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
    session_start();
    include './includes/header.php';
    include './includes/colonne.php';
?>
<?php 
    if (isset($_GET['section'])) {
        switch ($_GET['section']) {
            case 'compte':
                var_dump($_SESSION);
                break;
            case 'reservations':
                echo 'reservations';
                break;
            default:
                break;
        } 
    } else {
        echo 'Bienvenue sur le tableau de bord.';
    }
?>


</body>
</html>