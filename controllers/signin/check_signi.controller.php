<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $Email = htmlspecialchars($_POST['email']);
    $PWD = htmlspecialchars($_POST['PWD']);
    $user = getUser($Email);
    if (count($user) > 0){
        if(password_verify($PWD, $user[3])){
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $Email;
            header('location: /home');  
        }else{
            echo 'Password is incorrect';
        }
    }else{
        echo "no user found";
    }
}
