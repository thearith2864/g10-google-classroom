<?php
require "models/teacher.model.php";
require "models/student.model.php";

$classes = displayClass();

$event = get_assignment();

$join_classes = displayJoinClass();

require "views/home/home.view.php";
