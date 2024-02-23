<div id="colonne">
    <h2>Bonjour <?= $_SESSION['user'] ?> !</h2>
    <ul>
        <li onclick="location.href='?section=compte'">Mon compte</li>
        <?php if ($_SESSION['user'] == 'admin') { ?>
            <li onclick="location.href='?section=reservations'">Réservations</li>
        <?php } ?>
    </ul>
</div>
    