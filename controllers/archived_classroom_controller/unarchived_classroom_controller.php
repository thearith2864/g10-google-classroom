<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require "../../database/database.php";
    require "../../models/assignment_model.php";
    if (isset($_POST['unarchive'])) {
        $classroom_code = $_POST['classroom_code'];
    
        unArchiveClassroom($classroom_code);
        header('Location: /home');
    
    }
}