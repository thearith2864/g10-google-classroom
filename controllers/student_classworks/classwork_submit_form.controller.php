<?php
require "models/assignment_model.php";
require "database/database.php";
$isassignment = $_GET['id'];
$checkass = checkcomment($isassignment);
$chooose = choosessignment($isassignment);
$pdf = choosessignment($isassignment);
$displaycomment  = displayCM();
$user_id = get_user_id();
$studentsAS = chooseAssignmentStudent($_GET['id']);
$displaycomment  = displayCM();
$owner = classowner($_GET['codeclass']);
require('views/student_classworks/classwork_submit_form.view.php');