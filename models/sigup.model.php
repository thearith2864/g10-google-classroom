<?php 
function signUp(string $name, string $email, string $password) : bool
{
    global $connection;
    $defaultRole = 'user';
    $statement = $connection->prepare("insert into users (name, email, password, role) values (:name, :email, :password, :role)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $defaultRole
    ]);
    return $statement->rowCount() > 0;
    
}