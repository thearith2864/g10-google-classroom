<?php
require "models/assignment_model.php";
require "database/database.php";
$allclass = displayAllClass();
$alltopic = displayAlltopics();
require "views/assignments/assignments.views.php";
