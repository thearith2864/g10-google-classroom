<?php
session_start();
require_once("../../database/database.php");
require_once("../../models/teacher.model.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classroom_name = $_POST['className'];

    // create class code by random
    $numbers = range(0, 9);

    // Array of alphabets
    $alphabets = range('a', 'z');
    
    // Merge the arrays
    $combined = array_merge($numbers, $alphabets);
    
    // Generate a random combination of numbers and alphabets
    $classroom_code = '';
    for ($i = 0; $i < 5; $i++) {
        $randomIndex = array_rand($combined);
        $classroom_code .= $combined[$randomIndex];
    }
    //The session value is get form the file '../signup/signup.controller.php'
    $user_email = $_SESSION['user_email'];

    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $room = $_POST['room'];

    $isCreate = createClass($classroom_name,$classroom_code, $section, $subject, $room,$user_email);
    if($isCreate){
        header('location: /trainer-classroom');
    }

}