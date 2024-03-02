<?php
require "models/assignment_model.php";
require "database/database.php";
require "models/student.model.php";
$codeclass = $_GET['id'];
$chose = selectstudent($codeclass);
print_r($chose);
 $checkid = selectidInclass($codeclass);
//  print_r ($checkid['classroom_name']);
 $checkAssignments = checkassignment($checkid['classroom_id']);
require "views/page_each_class/details_class.view.php";
