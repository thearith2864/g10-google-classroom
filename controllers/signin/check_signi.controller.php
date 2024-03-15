<?php
ini_set('session.cookie_lifetime', 86400);
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
require_once '../../models/student.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['passwd'])) {
        $Email = htmlspecialchars($_POST['email']);
        $PWD = htmlspecialchars($_POST['passwd']);
        $user = getUser($Email);
        $image = getimage($Email);
        if ($image[4] === '') {
            // Account that has image____________________________

            if (count($user) > 0) {
                if (password_verify($PWD, $user['user_password'])) {
                    $_SESSION['user'] = $user;
                    $_SESSION['email'] = $Email;
                    $_SESSION['image_url'] = getProfile($_SESSION['email'])[0][0];
                    header('location: /home');
                } else {
                    echo 'Password is incorrect';
                }
            } else {
                echo "no user found";
            }
        } else {
            // Account that have image______________________
            if (count($user) > 0) {
                if (password_verify($PWD, $user['user_password'])) {
                    $_SESSION['user'] = $user;
                    $_SESSION['email'] = $Email;
                    $_SESSION['image_url'] = $image;
                    $_SESSION['user_id'] = $image;
                    header('location: /home');
                } else {
                    echo 'Password is incorrect no';
                }
            } else {
                echo "no user found";
            }
        }
    }
}
