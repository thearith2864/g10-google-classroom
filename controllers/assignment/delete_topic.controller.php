<?php
require "../../database/database.php";
require "../../models/assignment_model.php";
$topic_id = $_GET['id'];
deleteTopics($topic_id);
header ('location: /');