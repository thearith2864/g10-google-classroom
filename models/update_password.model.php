<?php

function updateSetting($newPwd, $name, $user_id){
    global $connection;
    $statement = $connection -> prepare('UPDATE users SET user_name  = :name, user_password = :user_password where user_id = :user_id');
    $statement->execute([
        ':name'=> $name,
        ':user_password'=> $newPwd,
        ':user_id'=> $user_id,
    ]);
}

function getAllusers(){
    global $connection;
    $statement = $connection->prepare('select * from users');
    $statement -> execute();
    return $statement->fetchAll();
}