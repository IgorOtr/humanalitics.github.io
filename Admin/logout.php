<?php
    session_start();

    session_destroy();

    unset($_SESSION['nome']);

    unset($_SESSION['email']);

    session_unset();

    header('location: http://localhost/Humanalitics/Admin/login.php');