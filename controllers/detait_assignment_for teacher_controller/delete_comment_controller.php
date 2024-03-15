<?php
require "../../models/assignment_model.php";
require "../../database/database.php";
$idcomment = $_GET['id'];
$idassignmet = $_GET['idassignment'];
$codeclass = $_GET['code'];
deleteComment($idcomment);

header('Location: /detait_assignment?id=' . $idassignmet . '&codeclass=' . $codeclass);

