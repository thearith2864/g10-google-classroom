<?php
require "models/assignment_model.php";
require "database/database.php";
$allclass = displayAllClass();
$alltopic = displayAlltopics();
$id = $_GET['id'];
$each_assignment = selectAssignment($id);
require "views/assignments/edit_assignment.view.php";
