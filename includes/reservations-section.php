<div id="reservations-section">
    <?php
        require_once('./src/classes/Database.php');

        $db = new Database();
        $reservations = $db->getAllReservations();
        foreach ($reservations as $reservation) {
            echo 
            '<div class="reservation-card">
                <h3> Nom : ' . $reservation->getNom() . '</h3>
                <div class="reservation-column">
                    <p> Prenom : </p>
                    <p> Mail : </p>
                    <p> Telephone : </p>
                    <p> Adresse : </p>
                    <p> Nombre de places : </p>
                    <p> Prix total : </p>
                    <p> Date : </p>
                    
                    <p> Nombre de casques enfants : </p>
                    <p> Nombre de luges d\'ete : </p>
                </div>
                <div class="reservation-column">
                    <p>' . $reservation->getPrenom() . '</p>
                    <p>' . $reservation->getMail() . '</p>
                    <p>' . $reservation->getTelephone() . '</p>
                    <p>' . $reservation->getAdresse() . '</p>
                    <p>' . $reservation->getNbPersonnes() . '</p>
                    <p>' . $reservation->getPrixTotal() . '€</p>
                    <p>' . $reservation->getDate() . '</p>
                    <p>' . $reservation->getNbCasquesEnfants() . '</p>
                    <p>' . $reservation->getNbLugesEte() . '</p>
                </div>
            </div>';
        }

    ?>
</div>
