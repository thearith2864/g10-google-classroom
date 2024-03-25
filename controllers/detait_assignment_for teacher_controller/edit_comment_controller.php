<?Php
require "../../database/database.php";
require "../../models/assignment_model.php";
if (isset($_SERVER['REQUEST_METHOD'])== "POST"){
    $comment = $_POST['comment'];
    $id = $_POST['idcomment'];
    $idassignment = $_POST['idassignment'];
    $codeclass = $_POST['classcode'];

    DeleteCM($id, $comment);
    if (isset($_POST['role'])){
        header('Location: /submit-form?id=' . $idassignment . '&codeclass=' . $codeclass);
    }elseif(isset($_POST['comment_user'])){
        header('Location: /detait_assignment?id=' . $idassignment . '&codeclass=' . $codeclass . '&user_id=' . $_POST['comment_user']);
    }
    else{
        header('Location: /detait_assignment?id=' . $idassignment . '&codeclass=' . $codeclass );

    }
}