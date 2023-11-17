<?php
session_start();

class User {

    public function Login($email, $password)
    {
        require '../db/connect.php';

       $sql = "SELECT * FROM users WHERE email = :email AND password = :pass";
       $auth_user = $conn->prepare($sql);
       $auth_user->bindValue(':email',$email);
       $auth_user->bindValue(':pass',$password);
       $auth_user->execute();

       $auth_result = $auth_user->fetch(PDO::FETCH_ASSOC);

       $rowCount = $auth_user->rowCount();

       if ($rowCount > 0) {
            $_SESSION["nome"] = $auth_result["name"];
            $_SESSION["email"] = $auth_result["email"];

            return header('location: http://localhost/Humanalitics/Admin');

       } else {

        $_SESSION['error-login'] = "Email e/ou senha inválidos.";

        return header('location: http://localhost/Humanalitics/Admin/login.php');
       }
    }
}