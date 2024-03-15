<?php
require "../../database/database.php";
require "../../models/teacher.model.php";
echo $_GET['id'];
leaveInclass( $_GET['id']);
header('Location: /trainer-student');
