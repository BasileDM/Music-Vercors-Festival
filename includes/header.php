    <header>
        <img src="../assets/images/vercorsLogo.png" id="logo" alt="Vercors_Music_Festival_Logo" onclick="location.href='../index'">

        <?php 
            session_start();
            if (isset($_SESSION['connected'])) { 
        ?>
            <div id='dashboard' class="bouton">
                <a href="dashboard">Tableau de bord</a>
            </div>
            <div id='deconnexion' class="bouton">
                <a href="../src/deconnexion">Deconnexion</a>
            </div>
        <?php } else { ?>
            <div id='connexion' class="bouton">
                <a href="./connexion">Connexion</a>
            </div>
        <?php } ?>
    </header>
