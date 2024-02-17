<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['passwd']);

    $user = getUser($email);

    if (count($user) > 0){
        if(password_verify($password, $user['user_password'])){
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
            header('location: /home');  
        }else{
            echo 'Password is incorrect';
        }
    }else{
        echo "no user found";
    }
}
