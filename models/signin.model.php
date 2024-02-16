<?php 
function getUser(string $email)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE user_email = :email");
    $statement->execute([":email" => $email]);
    $result = $statement->fetchAll();

    if (count($result) > 0) {
        return $result[0];
    } else {
        return [];
    }
}