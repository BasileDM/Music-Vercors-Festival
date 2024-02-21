// qaund on arrive sur le formulaire : affichage que de la section Réservation

const fieldsetReservation = document.getElementById('reservation');
const fieldsetOptions = document.getElementById('options');
const fieldsetCoordonnees = document.getElementById('coordonnees');

fieldsetReservation.style.display = 'block';
fieldsetOptions.style.display = 'none';
fieldsetCoordonnees.style.display = 'none';

// afficher les choix du jour pour pass 1 jour 

function afficheChoixDuJour() {
    let boutonPassUnJour = document.getElementById('pass1jour');
    let choixDuJour = document.getElementById('pass1jourDate');

    if (boutonPassUnJour.checked === true) {
        choixDuJour.style.display = 'block';
    } else {
    choixDuJour.style.display = 'none';
}
}


// animation bouton suivant réservation, quand on clic sur suivant : affichage que de la section Options

const boutonSuivantResevation = document.getElementById('boutonReservation');


boutonSuivantResevation.addEventListener('click', () => {
 fieldsetReservation.style.display = 'none';
 fieldsetOptions.style.display = 'block';
 fieldsetCoordonnees.style.display = 'none';
});

// animation bouton suivant réservation, quand on clic sur suivant : affichage que de la section Coordonnées

const boutonSuivantOptions = document.getElementById('boutonOptions');

boutonSuivantOptions.addEventListener('click', () => {
    fieldsetReservation.style.display = 'none';
    fieldsetOptions.style.display = 'none';
    fieldsetCoordonnees.style.display = 'block';
})


