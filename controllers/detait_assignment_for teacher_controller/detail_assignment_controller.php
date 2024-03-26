<?php
require "models/assignment_model.php";
require "models/student.model.php";
require "database/database.php";

$assignment = $_GET['id'];
$codeclass = $_GET['codeclass'];
$checkass = checkcomment($assignment);
$chooose =choosessignment($assignment);
$pdf =choosessignment($assignment);
$displaycomment  = displayCM();
$chose = selectstudent($codeclass);
// print_r($chose);
$studentfinished =  findsubmit($assignment);
// print_r($studentfinished);
if ( isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $studentWork = selectStudentWork ($user_id);
    // print_r($studentWork);
}
require "views/detail_assignment_for_teacher_view.php/detail_assignment_for_teaher_veiw.php";