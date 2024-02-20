<?php
ini_set('session.cookie_lifetime', 86400);
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Email = htmlspecialchars($_POST['email']);
    $PWD = htmlspecialchars($_POST['PWD']);
    $user = getUser($Email);
    $imahe = getimage($Email);
    if (count($user) > 0){
        if(password_verify($password, $user['user_password'])){
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $Email;
            $_SESSION['image_url'] = $imahe;
            ?>

            <?php
            header('location: /home');  
        }else{
            echo 'Password is incorrect';
        }
    }else{
        echo "no user found";
    }
}
