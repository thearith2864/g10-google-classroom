<?Php
require "../../database/database.php";
require "../../models/assignment_model.php";
if (isset($_SERVER['REQUEST_METHOD'])== "POST"){
    $comment = $_POST['comment'];
    $id = $_POST['idcomment'];
    $idassignment = $_POST['idassignment'];
    $codeclass = $_POST['classcode'];
    echo $codeclass;
    echo $idassignment;
    DeleteCM($id, $comment);
    header('Location: /detait_assignment?id=' . $idassignment . '&codeclass=' . $codeclass);
}