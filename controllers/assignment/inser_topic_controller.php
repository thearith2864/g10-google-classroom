<?php
require '../../models/assignment_model.php';
require '../../database/database.php';
if (isset($_SERVER['REQUEST_METHOD']) == 'POST'){
   $code = $_POST['code'] ;
   $topic = $_POST['topic'] ;
   $id = classowner($code);
   insert_topic($topic,$topic, $id[0]['classroom_id']);
   header('location: /class?id=' . $code);
}
?>;