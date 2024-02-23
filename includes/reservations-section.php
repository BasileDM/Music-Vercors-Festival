<div id="reservations-section">
    <?php
        require_once('./src/classes/Database.php');

        $db = new Database();
        $reservations = $db->getAllReservations();
        foreach ($reservations as $reservation) {
            var_dump($reservation);
        }

    ?>
</div>
