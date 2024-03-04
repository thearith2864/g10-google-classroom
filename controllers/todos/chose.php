<?php
require "../../database/database.php";
require "../../models/todo_model.php";
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    if (isset($_POST['select'])){
        echo $_POST['select'];
        $love = displayassignments($_POST['select']);
        // print_r($love);
    }
}