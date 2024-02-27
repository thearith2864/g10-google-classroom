<?php
require "models/assignment_model.php";
require "database/database.php";
$idclasswork = $_GET['id'];
 $detail = detailassignment($idclasswork);
require "views/assignent_detail/assignment_detail.veiw.php";