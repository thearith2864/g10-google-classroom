<?php
require "../../models/assignment_model.php";
require "../../database/database.php";
$idassignmet = $_GET['idassignment'];
$codeclass = $_GET['code'];
if ($_GET['ids']){
    $idcomment = $_GET['ids'];
    deleteComment($idcomment);
  
    header('Location: /submit-form?id=' . $idassignmet . '&codeclass=' . $codeclass);
}else{
    $idcomment = $_GET['id'];
    deleteComment($idcomment);
    header('Location: /detait_assignment?id=' . $idassignmet . '&codeclass=' . $codeclass);
}

