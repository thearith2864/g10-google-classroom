<?php

require "models/student.model.php";
$join_classes = displayJoinClass();
$class_owner = get_class_owners();
require "views/students/student.view.php";

// require "views/students/student.view.php";