<?php
require "../../models/assignment_model.php";
require "../../database/database.php";
if (isset($_FILES['cover_image'])  ){
    $codeclass = $_POST['idclass'];
    $cover_image = $_FILES['cover_image'];
    $img_name = $_FILES['cover_image']['name'];
    $img_size = $_FILES['cover_image']['size'];
    $tmp_name = $_FILES['cover_image']['tmp_name'];
	$error = $_FILES['cover_image']['error'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
	$allowed_exs = array("jpg", "jpeg", "png" , "gif" ,);
	if (in_array($img_ex_lc, $allowed_exs)) {
	$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
	$img_upload_path = '../../assets/images/cover_class/' . $new_img_name;
	move_uploaded_file($tmp_name, $img_upload_path);
    $insertCoverImage = InsertCoverImage ($codeclass, $new_img_name);
    header('location: /class?id=' . $codeclass);
    }   
}

?>