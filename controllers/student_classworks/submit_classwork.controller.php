<?php
session_start(); 

require "../../database/database.php";
require "../../models/assignment_model.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_FILES['file']) && isset($_POST['idAS'])){
        $codeclass = $_POST['idCS'];
        echo $codeclass;
        $idwork = $_POST['idAS'];
        $user_id = $_SESSION['user_id'];
        $fileAssignment = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];
        if ($error === 0){
            $file_ex = pathinfo($fileAssignment, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            $allowed_exs = array("pdf", "zip", "xls", "doc");
            if (in_array($file_ex_lc, $allowed_exs)) {
                $new_file_name = uniqid("$fileAssignment", true) . '.' . $file_ex_lc;
                $file_upload_path = '../../assets/files/Assignment_for_students_subment/' . $new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
                submit_classwork($idwork, $user_id['user_id'], $new_file_name, date('Y-m-d'));
                echo "riht";
                header('location: /submit-form?id='. $idwork . '&codeclass=' . $codeclass);
            }
        }
    }   
}