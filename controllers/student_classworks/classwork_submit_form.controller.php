<?php
require "models/assignment_model.php";
require "database/database.php";
$isassignment = $_GET['id'];
$checkass = checkcomment($isassignment);
// print_r($checkass[0]['file_work']);
$chooose =choosessignment($isassignment);
$pdf =choosessignment($isassignment);
$displaycomment  = displayCM();
require('views/student_classworks/classwork_submit_form.view.php');