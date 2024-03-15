<?php
require "models/teacher.model.php";
$classes = displayClass();
$enrolleds = get_enrolled();

require "views/classroom/your_classroom.view.php";
