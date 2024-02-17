<?php 
function signUp(string $name, string $password ,string $email ) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (name, password, email ) values(:name,  :password, :email)");
    $statement->execute([
        ':name' => $name,
        ':password' => $password,
        ':email' => $email
    ]);
    return $statement->rowCount() > 0;
}