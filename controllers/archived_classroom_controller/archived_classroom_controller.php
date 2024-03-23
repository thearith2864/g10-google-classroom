<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require "../../database/database.php";
    require "../../models/assignment_model.php";
    if (isset($_POST['archive'])) {
        $classroom_code = $_POST['classroom_code'];
    
        archiveClassroom($classroom_code);
        header('Location: /archived_classroom');
    
    }
}