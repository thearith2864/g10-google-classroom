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
    if($comment == ''){
		$_SESSION['errorcomment'] = 'please inter your comments before send !';	
        header('location: /detait_assignment?id='. $idassignmnt . '&codeclass=' . $classcode);
        exit;
	}
    if (isset($_POST['comments']) && !isset($_POST['comment_user'])) {
        $classworkid = $_POST['idclasswork'];
        $userid = $_POST['iduser'];
        insertcomment($classworkid, $userid, $comment, $TimeComment);
        if (isset($_POST['role'])){
            header('location: /submit-form?id='. $idassignmnt . '&codeclass=' . $classcode);
        }else{
            header('location: /detait_assignment?id='. $idassignmnt . '&codeclass=' . $classcode);
        }
    }if (isset($_POST['comment_user'])){
        echo "yes";
        $classworkid = $_POST['idclasswork'];
        $userid = $_POST['iduser'];
        $comment_user = $_POST['comment_user'];
        insertcommentPrivate($classworkid, $userid, $comment, $TimeComment, $comment_user);
        if (isset($_POST['role'])){
            header('location: /submit-form?id='. $idassignmnt . '&codeclass=' . $classcode);
        }else{
            header('location: /detait_assignment?id='. $idassignmnt . '&codeclass=' . $classcode . '&user_id=' . $comment_user);
           
        }
    }

}