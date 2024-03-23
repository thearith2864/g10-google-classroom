<?php
// require "database/database.php";
require "models/student.model.php";
$user_id = $_SESSION['user'];
$join_classes = displayJoinClass();
$class_owner = get_class_owners();
$invite = checkclassinvite();
// print_r($invite);
require "views/students/student.view.php";

// require "views/students/student.view.php";