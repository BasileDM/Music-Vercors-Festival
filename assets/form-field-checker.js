let errorMessage;

// # Functions
// Display error, stylize the field and return false
function displayError(field, errorMessage) {
    field.style.border = "2px solid red";

    if (!document.querySelector(".error-message-" + field.id)) {
        const error = document.createElement("p");
        error.classList.add("error-message-" + field.id);
        error.textContent = errorMessage;
        error.style.color = "red";
        field.parentNode.insertBefore(error, field.nextSibling);
    } else {
        document.querySelector(".error-message-" + field.id).textContent = errorMessage;
    }
    return false;
}

// Validate field, stylize the field and return true
function validateField(field) {
    field.style.border = "2px solid green";
    if (document.querySelector(".error-message-" + field.id))
        document.querySelector(".error-message-" + field.id).remove();
    return true;
}

// Basic number check
function isNumberValid(number) {
    if (number == "e" || number == "" || number == null || number == undefined) {
        return false;
    } else {
        return true;
    }
}

// # Fields section 1
// Nombre de réservations
const reservationField = document.getElementById("NombrePlaces");
reservationField.value = 1;
let isReservationFieldValid = true;
const minPlaces = 1;
const maxPlaces = 99;
reservationField.setAttribute("min", minPlaces);
reservationField.setAttribute("max", maxPlaces);

reservationField.onchange = () => {
    reservationField.value = Math.round(reservationField.value);
    if (
        !isNumberValid(reservationField.value) ||
        reservationField.value < minPlaces ||
        reservationField.value > maxPlaces
    ) {
        errorMessage = "Le nombre de places doit être compris entre " + minPlaces + " et " + maxPlaces + ".";
        isReservationFieldValid = displayError(reservationField, errorMessage);
    } else {
        isReservationFieldValid = validateField(reservationField);
    }
};

// Complete reservation section check
const pass1jour = document.getElementById("pass1jour");
const pass2jours = document.getElementById("pass2jours");
const pass3jours = document.getElementById("pass3jours");
const boutonReservation = document.getElementById("boutonReservation");

// Hide next section button untill everything is validated
checkIfPassIsSelected();
function checkIfPassIsSelected() {
    if (pass1jour.checked === true || pass2jours.checked === true  || pass3jours.checked === true) {
        boutonReservation.style.display = "flex";
        document.getElementById("nextSectionPlaceholder") ? document.getElementById("nextSectionPlaceholder").remove() : null;
    } else {
        boutonReservation.style.display = "none";
        let nextSectionPlaceholder = document.createElement("p");
        nextSectionPlaceholder.id = "nextSectionPlaceholder";
        nextSectionPlaceholder.innerHTML = "<p style='color: red;'>Veuillez selectionner une formule.</p>";
        boutonReservation.parentNode.insertBefore(nextSectionPlaceholder, boutonReservation.nextSibling);
    }
}
pass1jour.onchange = () => {
    checkIfPassIsSelected();
}
pass2jours.onchange = () => {
    checkIfPassIsSelected();
}
pass3jours.onchange = () => {
    checkIfPassIsSelected();
}


// Casques anti-bruit
const noiseReductionField = document.getElementById("nombreCasquesEnfants");
noiseReductionField.value = 0;
let isNoiseReductionFieldValid = true;
let headphonesStock = 42;
noiseReductionField.setAttribute("min", 0);
noiseReductionField.setAttribute("max", headphonesStock);

noiseReductionField.onchange = () => {
    noiseReductionField.value = Math.round(noiseReductionField.value);

    if (!isNumberValid(noiseReductionField.value) || noiseReductionField.value < 0) {
        errorMessage = "Le nombre de casques doit être positif.";
        isNoiseReductionFieldValid = displayError(noiseReductionField, errorMessage);

    } else if (noiseReductionField.value > headphonesStock) {
        errorMessage = "Il ne reste que " + headphonesStock + " casques en stock.";
        isNoiseReductionFieldValid = displayError(noiseReductionField, errorMessage);

    } else {
        isNoiseReductionFieldValid = validateField(noiseReductionField);
    }
};

// Descentes en luge d'été
const summerSledField = document.getElementById("NombreLugesEte");
summerSledField.value = 0;
let isSummerSledFieldValid = true;
summerSledField.setAttribute("min", 0);
summerSledField.setAttribute("max", 99);

summerSledField.onchange = () => {
    summerSledField.value = Math.round(summerSledField.value);
    if (!isNumberValid(summerSledField.value) || summerSledField.value < 0) {
        errorMessage = "Le nombre de descentes doit être compris entre 0 et 99.";
        isSummerSledFieldValid = displayError(summerSledField, errorMessage);
    } else {
        isSummerSledFieldValid = validateField(summerSledField);
    }
}