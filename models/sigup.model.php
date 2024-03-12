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

function signUpNotImage(string $name, string $password ,string $email, $imgDefault) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (user_name,  user_email, user_password, image_url) values(:name,  :email, :password, :imgDefault)");
    $statement->execute([
        ':name' => $name,
        ':password' => $password,
        ':email' => $email,
        ':imgDefault'=> $imgDefault
    ]);
    return $statement->rowCount() > 0;
}