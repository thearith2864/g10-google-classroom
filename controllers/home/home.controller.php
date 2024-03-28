<?php
require "models/teacher.model.php";
require "models/student.model.php";

$classes = displayClass();
// print_r($classes);
$teacher = chooseTeacher ();

// $_SESSION['event'] = get_assignment();

$join_classes = displayJoinClass();

require "views/home/home.view.php";
