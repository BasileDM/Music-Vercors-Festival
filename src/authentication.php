<?php
    require_once './config.php';

    if (isset($_POST['soumission'])) {
        $password = $_POST['password'];
    } else {
        header('location:../index');
        exit;
    }

    if ($password === 'vercors') {
        session_start();
        $_SESSION['connected'] = true;
        $_SESSION['user'] = 'admin';
        header('location:../dashboard');
        exit;
    } else {
        header('location:../connexion?error='.ERROR_PASSWORD);
        exit;
    }
?>