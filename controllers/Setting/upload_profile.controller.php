<?php


session_start();
require "../../database/database.php";
require "../../models/student.model.php";




if(isset($_FILES['my_image'])){
    echo"<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if($error === 0){
        if($img_size > 1200000){
            header('Location: /home');
        }else{
           
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            
            $allowed_exs = array("jpg", "jpeg", "png");
            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '../../assets/images/profiles/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                uploadProfile($_SESSION['email'], $new_img_name);
                $_SESSION['image_url'] = getProfile($_SESSION['email'])[0][0];
                header('Location: /home');
        }else{
            header('Location: /home');
        }
}
}
}
header('Location: /home');
