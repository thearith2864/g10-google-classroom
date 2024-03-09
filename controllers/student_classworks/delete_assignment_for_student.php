<?php 
require "../../database/database.php";
require "../../models/assignment_model.php";
$idWork = $_GET['id'];
$code = $_GET['code'];
$AS = $_GET['AS'];
DeleteWork ($idWork);
header('location: /submit-form?id='. $AS . "&codeclass=" . $code);

