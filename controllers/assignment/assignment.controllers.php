<?php
require "models/assignment_model.php";
require "database/database.php";
$allclass = displayAllClass();
$alltopic = displayAlltopics();
echo $_GET['type'];
require "views/assignments/assignments.views.php";
