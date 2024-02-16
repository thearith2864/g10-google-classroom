<?php 
function signUp(string $name, string $password, string $email) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (user_name, user_password, user_email) values (:name, :password, :email)");
    $statement->execute([
        ':name' => $name,
        ':password' => $password,
        ':email' => $email
    ]);
    return $statement->rowCount() > 0;
    
}