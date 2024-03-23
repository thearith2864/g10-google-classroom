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
if(isset($_GET['id'])){
    // print_r($_SESSION['email']);
    $jointed = 'true';
    $codeclass = $_GET['id'];
    $iviteId = $_GET['iviteID'];
    $user_email = $_SESSION['email'];
     $student = checkmember ($_SESSION['email']);
    foreach ($student as $joint){
        if ($joint['classroom_code'] == $codeclass && $jointed == "true"){
           $jointed = "false";
        }
    }
    if($jointed == "true"){
        echo $jointed;
        echo "yes";
        echo $codeclass;
        echo $joint['classroom_code'];
    $isjoin = joinClass($codeclass, $user_email);
    if($isjoin){
        deleteInvite ($iviteId);
        header('location: /trainer-student');
    }
}else{
    echo "no";
    echo $jointed;
    
    deleteInvite ($iviteId);
    header('location: /trainer-student');   
}
}
if (isset($_GET['iviteID'])){
    $iviteId = $_GET['iviteID'];
    deleteInvite ($iviteId);
    // header('location: /trainer-student');
}
;