<?php
require "models/student.model.php";
$join_classes = displayJoinClass();
$class_owner = get_class_owners();
require "views/classroom/join_classroom.view.php";

