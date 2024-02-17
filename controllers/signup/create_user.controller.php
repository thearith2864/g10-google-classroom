<?php 
require "../../database/database.php";
require "../../models/sigup.model.php";
require "../../models/signin.model.php";

if ($_SERVER['REQUEST_METHOD'] === "POST"){

    if(isset($_POST['username']) & isset($_POST['email']) & isset($_POST['pwd'])){
        $UserName = htmlspecialchars($_POST['username']);
        $Email = htmlspecialchars($_POST['email']);
        $PWD = htmlspecialchars($_POST['pwd']);

        $passwordHash = password_hash($PWD, PASSWORD_BCRYPT);
        $user = getUser($Email);
        if (count($user) == 0){
            $iscreated = signUp($UserName, $passwordHash, $Email);
            if($isCreated){
                header ('Location: /signup');
            }else{
                header ('Location: /signin');
            }
        }else{
            echo "User already exists";
        }
    }
}