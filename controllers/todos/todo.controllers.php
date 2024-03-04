<?php
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    require "models/todo_model.php";
    require "database/database.php";
    if (isset($_POST['select'])){
        $select = $_POST['select'];
        if ($select === 'All class'){
           $selectAll = displayassignmentsAll();
        //    print_r($selectAll);
        }else{
        $select = $_POST['select'];
        $assigmentS = displayassignments($select);
        // print_r($assigmentS); 
        }  
    }
    $displayclass = selectclass();
    require "views/totos/todo_form.views.php";  
    
}else{
require "database/database.php";
require "models/todo_model.php";
$displayclass = selectclass();
require "views/totos/todo_form.views.php";  
}


