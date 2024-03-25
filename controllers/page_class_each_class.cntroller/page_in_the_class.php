<?php
require "models/assignment_model.php";
require "database/database.php";
require "models/student.model.php";
$codeclass = $_GET['id'];
$cover_image = chooseCoverImage ($codeclass);
$chose = selectstudent($codeclass);
$checkid = selectidInclass($codeclass);
$teacher = getteacher ($codeclass);
$alltopic = displayAlltopics();
$id = classowner($codeclass);
 $checkAssignments = checkassignment($checkid['classroom_id']);
require "views/page_each_class/details_class.view.php";
