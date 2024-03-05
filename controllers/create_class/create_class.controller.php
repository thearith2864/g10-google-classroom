<?php
session_start();
require_once("../../database/database.php");
require_once("../../models/teacher.model.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        $classroom_name = $_POST['className'];
        if ($classroom_name == '') {
            $_SESSION['error_classname'] = 'Class Name cannot be empty!';
            header('location: /create-class');
            exit;
        } else {

            // create class code by random
            $numbers = range(0, 9);

            // Array of alphabets
            $alphabets = range('a', 'z');

            // Merge the arrays
            $combined = array_merge($numbers, $alphabets);

            // Generate a random combination of numbers and alphabets
            $classroom_code = '';
            for ($i = 0; $i < 7; $i++) {
                $randomIndex = array_rand($combined);
                $classroom_code .= $combined[$randomIndex];
            }
            // The session value is obtained from the file '../signup/signup.controller.php'
            $user_email = $_SESSION['email'];
            $_SESSION['classroom_code'] = $classroom_code;
            $section = $_POST['section'];
            $subject = $_POST['subject'];
            $room = $_POST['room'];

            $isCreate = createClass($classroom_name, $classroom_code, $section, $subject, $room, $user_email);
            if ($isCreate) {
                $_SESSION['error_classname'] = '';
                header('location: /trainer-classroom');
            }
        }
    }
}
require('views/create_class/create_class_form.view.php');
