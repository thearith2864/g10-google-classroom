<?php
session_start();
require "../../models/teacher.model.php";
require "../../database/database.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_POST['email_student']) && isset($_POST['description']) && isset($_POST['code']) && isset($_POST['teacher_email'])){
        $Check = checkc();

        $student = $_POST['email_student'];
        if($student !== $_SESSION['email']){
        $teacher = $_POST['teacher_email'];
        $codeClass = $_POST['code'];
        $description = $_POST['description'];
        $idstudent = selectEmail($student);
        $idteacher = selectEmail($teacher);
        $invite =  inviteStudent($idstudent[0][0],$idteacher[0][0], $description, $codeClass);
        header('location: /class?id='. $codeClass . "&invitetrue"  );
    }else{
        $codeClass = $_POST['code'];
        header('location: /class?id='. $codeClass . "&invitefalse"  );
        }
    }
}