<?php
session_start(); // Start the session

require "../../database/database.php";
require "../../models/assignment_model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['file']) && !empty($_POST['file'])) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $isassignment = intval($_GET['id']);
            $classwork_id = $isassignment; 
            $user_id = get_user_id();
            $file_work = $_POST['file'];
            $date = date('Y-m-d');
            submit_classwork($classwork_id, $user_id, $file_work, $date);
            header('Location: /join_classrooms');
            exit();
        }
    }
}
