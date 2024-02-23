<?php
    require './config.php';

    if (isset($_POST['soumission'])) {
        $password = $_POST['password'];
    } else {
        header('location:../index.php');
        exit;
    }

    if ($password === 'vercors') {
        session_start();
        $_SESSION['connecté'] = true;
        $_SESSION['user'] = 'vercors';
        header('location:../dashboard.php');
        exit;
    } else {
        header('location:./connexion.php?error='.ERROR_PASSWORD);
        exit;
    }
?>