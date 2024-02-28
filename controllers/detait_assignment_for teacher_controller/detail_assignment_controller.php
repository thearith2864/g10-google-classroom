<?php
require "models/assignment_model.php";
require "database/database.php";
$isassignment = $_GET['id'];
$chooose =choosessignment($isassignment);
$pdf =choosessignment($isassignment);
require "views/detail_assignment_for_teacher_view.php/detail_assignment_for_teaher_veiw.php";