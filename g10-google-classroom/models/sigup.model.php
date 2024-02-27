<?php 
function signUp(string $name, string $password ,string $email, $image ) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (user_name,  user_email, user_password, image_url) values(:name,  :email, :password, :image)");
    $statement->execute([
        ':name' => $name,
        ':password' => $password,
        ':email' => $email,
        ':image' => $image
    ]);
    return $statement->rowCount() > 0;
}

//function for email that don't have image ________________________________________________________________________

function signUpNotImage(string $name, string $password ,string $email,) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (user_name,  user_email, user_password) values(:name,  :email, :password)");
    $statement->execute([
        ':name' => $name,
        ':password' => $password,
        ':email' => $email
    ]);
    return $statement->rowCount() > 0;
}