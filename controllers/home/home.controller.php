<?php
require "models/teacher.model.php";
require "models/student.model.php";

$classes = displayClass();

$join_classes = displayJoinClass();

require "views/home/home.view.php";
