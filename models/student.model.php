<?php 
function joinClass(string $classroom_code, string $user_email): bool {
    global $connection;
    $statement = $connection->prepare("INSERT INTO classroommembers (classroom_code, user_email) VALUES (:classroom_code, :user_email)");
    $statement->execute([
        ':classroom_code' => $classroom_code,
        ':user_email' => $user_email
    ]);
    return $statement->rowCount() > 0;
}