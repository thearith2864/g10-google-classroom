<?php

require "../../database/database.php";
require "../../models/update_password.model.php";


 $user_info = getAllusers();

foreach ($user_info as $key => $value) {
    if(password_verify($_POST['current_password'], $value['user_password']) && $value['user_email'] == $_POST['email']){
        $newPwd = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
        $name = $_POST['name'];
        $user_id = $value['user_id'];
        updateSetting($newPwd, $name, $user_id);
        header('Location: /home');
    }
}
