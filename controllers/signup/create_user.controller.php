<?php 
ini_set('session.cookie_lifetime', 86400);
session_start();
require "../../database/database.php";
require "../../models/sigup.model.php";
require "../../models/signin.model.php";

if ($_SERVER['REQUEST_METHOD'] === "POST"){

    if(isset($_POST['username']) && isset($_POST['passwd']) && isset($_POST['email'])){
        $userName = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['passwd']);

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $user = getUser($email);
        if (count($user) == 0){
            $isCreated = signUp($userName, $passwordHash, $email);
            if($isCreated){
                $_SESSION['email'] = $email;
                header('Location: /signin');
                exit(); 
            } else {
                header('Location: /home');
                exit(); 
            }
        } else {
            echo "User already created!";
        }
    }
}