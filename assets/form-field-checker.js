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
function isStringInvalid(number) {
    if (number == "e" || number == "" || number == null || number == undefined) {
        return true;
    } else {
        return false;
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
        isStringInvalid(reservationField.value) ||
        parseInt(reservationField.value) < minPlaces ||
        parseInt(reservationField.value) > maxPlaces
    ) {
        errorMessage = "Le nombre de places doit être compris entre " + minPlaces + " et " + maxPlaces + ".";
        isReservationFieldValid = displayError(reservationField, errorMessage);
    } else {
        isReservationFieldValid = validateField(reservationField);
    }
};

// Complete reservation section check
const tarifReduitCheckbox = document.getElementById("tarifReduit");

const pass1jour = document.getElementById("pass1jour");
const choixJour1 = document.getElementById("choixJour1");
const choixJour2 = document.getElementById("choixJour2");
const choixJour3 = document.getElementById("choixJour3");

const pass2jours = document.getElementById("pass2jours");
const choixJour12 = document.getElementById("choixJour12");
const choixJour23 = document.getElementById("choixJour23");

const pass3jours = document.getElementById("pass3jours");

const pass1jourreduit = document.getElementById("pass1jourreduit");
const pass2joursreduit = document.getElementById("pass2joursreduit");
const pass3joursreduit = document.getElementById("pass3joursreduit");
const boutonReservation = document.getElementById("boutonReservation");

// Hide next section button untill everything is validated
checkIfPassIsSelected();
function checkIfPassIsSelected() {
    if (
        pass1jour.checked === true ||
        pass2jours.checked === true ||
        pass3jours.checked === true ||
        pass1jourreduit.checked === true ||
        pass2joursreduit.checked === true ||
        pass3joursreduit.checked === true
    ) {
        boutonReservation.style.display = "flex";
        document.getElementById("nextSectionPlaceholder")
            ? document.getElementById("nextSectionPlaceholder").remove()
            : null;
    } else {
        boutonReservation.style.display = "none";
        let nextSectionPlaceholder = document.createElement("p");
        nextSectionPlaceholder.id = "nextSectionPlaceholder";
        nextSectionPlaceholder.innerHTML = "<p style='color: red;'>Veuillez sélectionner une formule.</p>";
        boutonReservation.parentNode.insertBefore(nextSectionPlaceholder, boutonReservation.nextSibling);
    }
}
tarifReduitCheckbox.onchange = () => {
    pass1jour.checked = false;
    pass2jours.checked = false;
    pass3jours.checked = false;
    pass1jourreduit.checked = false;
    pass2joursreduit.checked = false;
    pass3joursreduit.checked = false;
    choixJour1.checked = false;
    choixJour2.checked = false;
    choixJour3.checked = false;
    choixJour12.checked = false;
    choixJour23.checked = false;
}
pass1jour.onchange = () => {
    choixJour1.checked = false;
    choixJour2.checked = false;
    choixJour3.checked = false;
};
pass2jours.onchange = () => {
    choixJour12.checked = false;
    choixJour23.checked = false;
};
pass3jours.onchange = () => {
    checkIfPassIsSelected();
}
pass1jourreduit.onchange = () => {
    choixJour1.checked = false;
    choixJour2.checked = false;
    choixJour3.checked = false;
}
pass2joursreduit.onchange = () => {
    choixJour12.checked = false;
    choixJour23.checked = false;
}
pass3joursreduit.onchange = () => {
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

    if (isStringInvalid(noiseReductionField.value) || parseInt(noiseReductionField.value) < 0) {
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
    if (isStringInvalid(summerSledField.value) || parseInt(summerSledField.value) < parseInt(summerSledField.min) || parseInt(summerSledField.value) > parseInt(summerSledField.max)) {
        errorMessage = "Le nombre de descentes doit être compris entre 0 et 99.";
        isSummerSledFieldValid = displayError(summerSledField, errorMessage);
    } else {
        isSummerSledFieldValid = validateField(summerSledField);
    }
};
