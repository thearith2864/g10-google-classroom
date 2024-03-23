<?php
require "../../models/student.model.php";
require "../../database/database.php";
$id = $_GET['id'];
$class = $_GET['class'];
RemoveStudent ($id);
header('location: /class?id=' . $class);