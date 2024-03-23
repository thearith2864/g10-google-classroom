<?php 
function getUser ( string $Email){
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE user_email = :email");
    $statement->execute([":email" => $Email]);
    if($statement-> rowCount() > 0){
        return $statement->fetch();
    }else{
        return[];
    }
}

function getimage ( string $Email){
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE user_email = :email");
    $statement->execute([":email" => $Email]);
    if($statement-> rowCount() > 0){
        return $statement->fetch();
    }else{
        return [];
    }
}