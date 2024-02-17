<?php
session_start();
function createClass(string $classroom_name, string $classroom_code, string $section, string $subject, string $room , string $user_email): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO classrooms (classroom_name, classroom_code, section, subject, room, user_email)
    VALUES (:classroom_name, :classroom_code, :section, :subject, :room, :user_email)");
    $statement->execute([
        ':classroom_name' => $classroom_name,
        ':classroom_code' => $classroom_code,
        ':user_email' => $user_email,
        ':section' => $section,
        ':subject' => $subject,
        ':room' => $room,
    ]);

    return $statement->rowCount() > 0;
}

function displayClass() {
    global $connection;
    $user_email = $_SESSION['user_email'];
    $statement = $connection->prepare("SELECT classroom_name, classroom_code, section, subject, room FROM classrooms WHERE user_email = :user_email");
    $statement->bindParam(':user_email', $user_email);
    $statement->execute();
    return $statement->fetchAll();
}