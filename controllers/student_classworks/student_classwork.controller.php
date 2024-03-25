<?php
require "database/database.php";
require "models/assignment_model.php";
 $codeclass = $_GET['id'];
 $studentsAS = chooseAssignmentStudent($_GET['id']);
 $checkid = selectidInclass($codeclass);
 $checkAssignments = checkassignment($checkid['classroom_id']);
 $id = $_GET['id'];
 $each_assignment = selectAssignment($id);
 $select =  select_topict();
 $id = classowner($codeclass);
require('views/student_classworks/student_classwork.view.php');