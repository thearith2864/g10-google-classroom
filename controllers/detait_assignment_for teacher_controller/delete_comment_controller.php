<?php
require "../../models/assignment_model.php";
require "../../database/database.php";
$idassignmet = $_GET['idassignment'];
$codeclass = $_GET['code'];
var_dump($_GET);
if ($_GET['ids']){
    $idcomment = $_GET['ids'];
    deleteComment($idcomment);
  
    header('Location: /submit-form?id=' . $idassignmet . '&codeclass=' . $codeclass);
}elseif(isset($_GET['user'])){
    $idcomment = $_GET['id'];
    deleteComment($idcomment);
    $user = $_GET['user'];
}
else{
    $idcomment = $_GET['id'];
    deleteComment($idcomment);
    header('Location: /detait_assignment?id=' . $idassignmet . '&codeclass=' . $codeclass );

}
