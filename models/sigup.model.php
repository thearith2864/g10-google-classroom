<?php 
function signUp(string $name, string $password ,string $email, $image ) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (name,  email, password, image_url) values(:name,  :email, :password, :image)");
    $statement->execute([
        ':name' => $name,
        ':password' => $password,
        ':email' => $email,
        ':image' => $image
    ]);
    return $statement->rowCount() > 0;
}