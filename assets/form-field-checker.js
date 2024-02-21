let errorMessage;

/**
 * Displays an error to the specified field.
 *
 * @param {Node} field - The field element to display the error for.
 * @param {string} errorMessage - The error message to display.
 * @return {void}
 */
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
}

function validateField(field) {
    field.style.border = "2px solid green";
    if (document.querySelector(".error-message-" + field.id))
        document.querySelector(".error-message-" + field.id).remove();
}

// Reservation Number Field
const reservationField = document.getElementById("NombrePlaces");
let isReservationFieldValid = true;
const maxPlaces = 99;
const minPlaces = 1;
reservationField.setAttribute("max", maxPlaces);
reservationField.setAttribute("min", minPlaces);
reservationField.value = 1;

reservationField.onchange = () => {
    reservationField.value = Math.round(reservationField.value);
    if (
        reservationField.value < minPlaces ||
        reservationField.value > maxPlaces ||
        typeof parseInt(reservationField.value) != "number"
    ) {
        errorMessage = "Le nombre de places doit être compris entre " + minPlaces + " et " + maxPlaces + ".";
        displayError(reservationField, errorMessage);
        isReservationFieldValid = false;
    } else {
        validateField(reservationField);
        isReservationFieldValid = true;
    }
};

// Noise reduction headphones
const noiseReductionField = document.getElementById("nombreCasquesEnfants");
let isNoiseReductionFieldValid = true;
let headphonesStock = 99;
reservationField.value = 0;

noiseReductionField.onchange = () => {
    noiseReductionField.value = Math.round(noiseReductionField.value);
    if (
        noiseReductionField.value < 0 ||
        typeof parseInt(noiseReductionField.value) != "number"
    ) {
        errorMessage = "Le nombre de casques doit être positif.";
        displayError(noiseReductionField, errorMessage);
        isNoiseReductionFieldValid = false;
    } else if (noiseReductionField.value > headphonesStock) {
        errorMessage = "Il ne reste que " + headphonesStock + " casques en stock.";
        displayError(noiseReductionField, errorMessage);
        isNoiseReductionFieldValid = false;
    } else {
        validateField(noiseReductionField);
        isNoiseReductionFieldValid = true;
    }
}
