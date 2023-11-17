<?php

require '../classes/User.php';

if (isset($_POST['login-user'])) {

    $email = $_POST['user-email'];
    $password = $_POST['user-password'];

    $password = md5($password.'humanalitics');

    $class = new User();
    $login = $class->Login($email, $password);
}