// qaund on arrive sur le formulaire : affichage que de la section Réservation

const fieldsetReservation = document.getElementById('reservation');
const fieldsetOptions = document.getElementById('options');
const fieldsetCoordonnees = document.getElementById('coordonnees');

fieldsetReservation.style.display = 'block';
fieldsetOptions.style.display = 'none';
fieldsetCoordonnees.style.display = 'none';

// afficher les choix du jour pour pass 1 jour 

function afficherChoixUnJour() {
    let boutonPassUnJour = document.getElementById('pass1jour');
    let choixUnJour = document.getElementById('pass1jourDate');

    if (boutonPassUnJour.checked === true) {

        choixUnJour.style.display = 'block';
        
    } else {
    choixUnJour.style.display = 'none';
}
}

// afficher les choix des jours pour pass 2 jours

function afficherChoixDeuxJours() {
    let boutonPassDeuxJours = document.getElementById('pass2jours');
    let choixDeuxJours = document.getElementById('pass2joursDate');

    if (boutonPassDeuxJours.checked === true) {
        choixDeuxJours.style.display = 'block';
    } else {
        choixDeuxJours.style.display = 'none';
}
}

// afficher les tarif réduits

function afficherTarifReduit() {
    let boutonTarifReduit= document.getElementById('tarifReduit');
    let sectiontarifReduit = document.getElementById('sectiontarifReduit');

    if (boutonTarifReduit.checked === true) {
        sectiontarifReduit.style.display = 'block';
    } else {
        sectiontarifReduit.style.display = 'none';
}
}

// 


// animation bouton suivant réservation, quand on clic sur suivant : affichage que de la section Options

function suivant(elementId) {
    let elementAAfficher = document.getElementById(elementId);

    switch(elementId) {
        case "options":
            fieldsetReservation.style.display = "none";
            break;
        case "coordonnees":
            fieldsetOptions.style.display = "none";
            break;
    }
    if (elementId == "coordonnees") {
        fieldsetCoordonnees.style.display = "flex";
    } else {
        elementAAfficher.style.display = 'block';
    }
}




//const boutonSuivantResevation = document.getElementById('boutonReservation');


// boutonSuivantResevation.addEventListener('click', () => {
//  fieldsetReservation.style.display = 'none';
//  fieldsetOptions.style.display = 'block';
//  fieldsetCoordonnees.style.display = 'none';
// });


// animation bouton suivant réservation, quand on clic sur suivant : affichage que de la section Coordonnées


// const boutonSuivantOptions = document.getElementById('boutonOptions');

// boutonSuivantOptions.addEventListener('click', () => {
//     fieldsetReservation.style.display = 'none';
//     fieldsetOptions.style.display = 'none';
//     fieldsetCoordonnees.style.display = 'flex';
// })


