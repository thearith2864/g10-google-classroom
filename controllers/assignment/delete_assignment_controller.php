<?php
require "../../database/database.php";
require "../../models/assignment_model.php";
$classwork_id = $_GET['id'];
$codeclass = $_GET['codeclass'];
Deleteassignment($classwork_id);
header ('location: /class?id='. $codeclass);