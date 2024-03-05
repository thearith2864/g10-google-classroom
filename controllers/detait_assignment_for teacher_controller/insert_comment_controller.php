<?php
session_start();
require "../../models/assignment_model.php";
require "../../database/database.php";
$TimeComment ='';
if (empty($missingDateline)) {
    $TimeComment = date('Y-m-d H:i:s');
}
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $comment = $_POST['comments'];
    $idassignmnt = $_POST['idassignment'];
    $classcode = $_POST['classcode'];
    echo $classcode;
    if($comment == ''){
		$_SESSION['errorcomment'] = 'please inter your comments before send !';	
        header('location: /detait_assignment?id='. $idassignmnt . '&codeclass=' . $classcode);
        exit;
	}
    if (isset($_POST['comments'])) {
        $classworkid = $_POST['idclasswork'];
        $userid = $_POST['iduser'];
        insertcomment($classworkid, $userid, $comment, $TimeComment);
        header('location: /detait_assignment?id='. $idassignmnt . '&codeclass=' . $classcode);
    }
}