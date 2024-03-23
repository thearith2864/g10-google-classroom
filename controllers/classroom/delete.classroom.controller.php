<?php
require "../../database/database.php";
require "../../models/teacher.model.php";
if (isset($_GET['id'])){
    deleteClass($_GET['id']);
    header('Location: /trainer-classroom');
    
}else{
    leaveInclass( $_GET['ids']);
    header('Location: /trainer-student');

}

