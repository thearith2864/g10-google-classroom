<?php
require "models/teacher.model.php";
require "models/student.model.php";
require "models/assignment_model.php";
$assignment = get_assignment();
require "views/calendar_view/calendar_view.php";