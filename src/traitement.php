<?php

require_once './config.php';
require_once './classes/Database.php';
require_once './classes/Reservation.php';

if(isset($_POST['nombrePlaces']) && 
isset($_POST['nombreCasquesEnfants']) && 
isset($_POST['NombreLugesEte']) && 
isset($_POST['nom']) && 
isset($_POST['prenom']) && 
isset($_POST['email']) && 
isset($_POST['telephone']) && 
isset($_POST['adressePostale'])) {


    $max = 200;


    if(filter_var($_POST['nombrePlaces'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 0, "max_range"=>$max)))){
        $nombrePlaces = ($_POST['nombrePlaces']);
    } else {
            header('location:../index?error='.ERROR_NUMBER_OF_PLACES);
    exit;
    }

    if(filter_var($_POST['nombreCasquesEnfants'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 0, "max_range"=> $max))) || $_POST['nombreCasquesEnfants'] === '0') {
        $nombreCasquesEnfants = ($_POST['nombreCasquesEnfants']);    
    } else {
        header('location:../index.php?error='.ERROR_NUMBER_OF_HEADPHONES);
    exit;
    }

    if(filter_var($_POST['NombreLugesEte'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 0, "max_range"=> $max))) || $_POST['NombreLugesEte'] === '0') {
        $nombreLugesEte = ($_POST['NombreLugesEte']);    
    } else {
        header('location:../index.php?error='.ERROR_NUMBER_OF_HEADPHONES);
    exit;
    }

    $nom = htmlspecialchars($_POST['nom']);

    $prenom = htmlspecialchars($_POST['prenom']);

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        header('location:../index.php?error='.ERROR_EMAIL);
    exit;
    }

    if(filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT)) {
        $telephone = htmlspecialchars($_POST['telephone']);
    }else {
        header('location:../index.php?error='.ERROR_PHONE);
        exit;
    }

    $adressePostale = htmlspecialchars($_POST['adressePostale']);    
    };

// var_dump($_POST);

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



// if ($_POST['tenteNuit1'] === 'tenteNuit1') {
//     $tenteNuit = $_POST['tenteNuit1'];
// } elseif ($_POST['tenteNuit2'] === 'tenteNuit2') {
//     $tenteNuit = $_POST['tenteNuit2'];
// } elseif ($_POST['tenteNuit3'] === 'tenteNuit3') {
//     $tenteNuit = $_POST['tenteNuit3'];
// } elseif ($_POST['tente3Nuits'] === 'tente3Nuits') {
//     $tenteNuit = $_POST['tente3Nuits'];
// }

//Selection des dates pour les tentes
if (isset($_POST['tenteNuit1'])) {
    $tenteNuit = $_POST['tenteNuit1'];
} elseif (isset($_POST['tenteNuit2'])) {
    $tenteNuit = $_POST['tenteNuit2'];
} elseif (isset($_POST['tenteNuit3'])) {
    $tenteNuit = $_POST['tenteNuit3'];
} elseif (isset($_POST['tente3Nuits'])) {
    $tenteNuit = $_POST['tente3Nuits'];
} else { 
    $tenteNuit === null;
}

 


//Selection des dates pour les vans

if (isset($_POST['vanNuit1'])) {
    $vanNuit = $_POST['vanNuit1'];
} elseif (isset($_POST['vanNuit2'])) {
    $vanNuit = $_POST['vanNuit2'];
} elseif (isset($_POST['vanNuit3'])) {
    $vanNuit = $_POST['vanNuit3'];
} elseif (isset($_POST['van3Nuits'])) {
    $vanNuit = $_POST['van3Nuits'];
}


$newReservation = new Reservation(
    $nom,
    $prenom,
    $email,
    $telephone,
    $adressePostale,
    $nombrePlaces,
    $prixTotal,
    $date,
    $nombreCasquesEnfants,
    $nombreLugesEte,
    $tenteNuit,
    $vanNuit
);

$DB = new Database();
$retour = $DB->saveReservation($newReservation);

if ($retour) {
    header('location:../receipt?nom=' . $newReservation->getNom() 
    . '&prenom=' . $newReservation->getPrenom()
    . '&nbPersonnes=' . $newReservation->getNbPersonnes()
    . '&prixTotal=' . $newReservation->getPrixTotal()
    . '&date=' . $newReservation->getDate()
    . '&nbCasquesEnfants=' . $newReservation->getNbCasquesEnfants()
    . '&nbLugesEte=' . $newReservation->getNbLugesEte()
    . '&tente=' . $newReservation->getTente()
    . '&van=' . $newReservation->getVan()
    
);
    die;
} else {
    header('location:../index?error='.ERROR_DB);
}

?>