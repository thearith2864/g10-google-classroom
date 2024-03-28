<?php

require "models/teacher.model.php";
require "models/student.model.php";
require "models/assignment_model.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["archived"]) && isset($_POST["classroomId"])) {
    $classroomId = $_POST["classroomId"];
    if (!empty($classroomId)) {
        $success = archiveClassroom($classroomId);
        if ($success) {
            header("Location: archived_classroom_controller.php");
            exit();
        } else {
            echo "Error archiving classroom.";
        }
    }
}

$classes = getArchiveClassrooms();
$teacher = chooseTeacher();
// $_SESSION['event'] = get_assignment();

require "views/Archived_classroom_view/Archived_classroom_view.php";
