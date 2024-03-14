<?php
require "../../database/database.php";
require "../../models/student.model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['score'])){
    $score = $_POST['score'];
    $work_id = $_POST['submit_id'];
    $assignment_id = $_POST['ass_id'];
    $code = $_POST['code'];
    $user_id = $_POST['user_id'];
    echo $score;
    echo $work_id;
    echo $assignment_id;
    echo $code;
    $insert = insertscore ($work_id, $score);
    header('location: /detait_assignment?id=' . $assignment_id . "&codeclass=" . $code . "&user_id=" . $user_id);
    }
}
