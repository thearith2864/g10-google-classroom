<?php
session_start();
require_once("../../database/database.php");
require_once("../../models/student.model.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['classcode'])){
        $classroom_code = $_POST['classcode'];
        $user_email = $_SESSION['email'];
        $isjoin = joinClass($classroom_code, $user_email);
        if($isjoin){
            header('location: /trainer-student');
        }
    }
}