<?php
require "../../database/database.php";
require "../../models/assignment_model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if ( isset($_POST['title']) && isset($_POST['instruction']) && isset($_POST['date']) && isset($_POST['class']) && isset($_POST['topic']) && isset($_POST['point']) && isset($_POST['date_of_create']) && isset($_FILES['files'])){
    $title = $_POST['title'];
    $Instruction = $_POST['instruction'];
    $date = $_POST['date'];
    $class = $_POST['class'];
    $topic = $_POST['topic'];
    $point = $_POST['point'];
    $date_create = $_POST['date_of_create'];
    $assigment = "Assinment";
    $topic = $_POST['topic'];
    $idtopic = selectidtopic($topic);
    $files = $_FILES['files'];
    $idclass = selectidAssignment($class);
    // -------------get assignment file--------------
    $fileAssignment = $_FILES['files']['name'];
	$file_size = $_FILES['files']['size'];
	$tmp_name = $_FILES['files']['tmp_name'];
	$error = $_FILES['files']['error'];
    //------------------condition---------------
    if ($error === 0){
        $file_ex = pathinfo($fileAssignment, PATHINFO_EXTENSION);
        $file_ex_lc = strtolower($file_ex);
        $allowed_exs = array("pdf", "zip", "xls", "doc");
		if (in_array($file_ex_lc, $allowed_exs)) {
            $new_file_name = uniqid("IMG-", true) . '.' . $file_ex_lc;
            $file_upload_path = '../../assets/files/assignment_files/' . $new_file_name;
            move_uploaded_file($tmp_name, $file_upload_path);
            $isert = createAssignment($title, $Instruction ,$new_file_name ,$idclass[0] ,$point, $date, $idtopic[0], $date_create , $assigment   );
            header ("location: /trainer-classroom");
        }
    }
}
}