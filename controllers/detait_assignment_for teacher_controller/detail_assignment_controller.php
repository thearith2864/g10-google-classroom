<?php
require "models/assignment_model.php";
require "database/database.php";
$isassignment = $_GET['id'];
// echo $isassignment;
$checkass = checkcomment($isassignment);
// print_r($checkass[0]['file_work']);
$chooose =choosessignment($isassignment);
$pdf =choosessignment($isassignment);
$displaycomment  = groupjoin();
// print_r($displaycomment[0]['file_work']);
require "views/detail_assignment_for_teacher_view.php/detail_assignment_for_teaher_veiw.php";