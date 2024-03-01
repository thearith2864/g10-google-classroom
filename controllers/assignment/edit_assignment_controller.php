<?php
require "../../database/database.php";
require "../../models/assignment_model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_POST['title']) && isset($_POST['instruction']) && isset($_POST['point']) && isset($_POST['date']) && isset($_POST['id_classwork']) && isset($_POST['date_of_create'])){
        $codeclass = $_POST['codeclass'];
        $title = $_POST['title'];
        $Instruction = $_POST['instruction'];
        $point = $_POST['point'];
        $dateline = $_POST['date'];
        $id_classwork = $_POST['id_classwork'];
        $datecreate = $_POST['date_of_create'];
        Updateassignment($title, $Instruction, $datecreate, $point, $id_classwork, $dateline);
        header ('location: /class?id='. $codeclass);
    }
}