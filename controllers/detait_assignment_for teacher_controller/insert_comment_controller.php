<?php
session_start();
require "../../models/assignment_model.php";
require "../../database/database.php";
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $comment = $_POST['comments'];
    $idassignmnt = $_POST['idassignment'];
    if($comment == ''){
		$_SESSION['errorcomment'] = 'please inter your comments before send !';	
        header('location: /detait_assignment?id='. $idassignmnt);
        exit;
	}
    if (isset($_POST['comments'])) {
        $classworkid = $_POST['idclasswork'];
        $userid = $_POST['iduser'];
        $time_comment = $_POST['time_comment'];
        insertcomment($classworkid, $userid, $comment, $time_comment);
        header('location: /detait_assignment?id='. $idassignmnt);
    }
}