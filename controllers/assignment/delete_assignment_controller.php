<?php
require "../../database/database.php";
require "../../models/assignment_model.php";
$classwork_id = $_GET['id'];
Deleteassignment($classwork_id);
header ('location: /trainer-classroom');