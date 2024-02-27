<?php
require "../../models/teacher.model.php";
require "../../database/database.php";
$code = $_GET['id'];
$get = updateClass($code);
require "../../views/form_update/form_update.view.php";