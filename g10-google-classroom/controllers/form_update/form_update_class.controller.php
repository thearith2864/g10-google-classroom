<?php
// session_start();
require_once("../../database/database.php");
require_once("../../models/teacher.model.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $subject = $_POST['subject'];
    $className = $_POST['classsName'];
    $section = $_POST['section'];
    $room = $_POST['room'];
    $id = $_POST['id'];
    $UPDATE = updateClasses($className, $section, $subject, $room, $id);
    header('location: /trainer-classroom');
    
}

