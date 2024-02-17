<?php

function createClass(string $classroom_name, string $classroom_code, string $section, string $subject, string $room , string $user_email): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO classrooms (classroom_name, classroom_code, section, subject, room, user_email)
    VALUES (:classroom_name, :classroom_code, :section, :subject, :room, :teacher_id)");
    $statement->execute([
        ':classroom_name' => $classroom_name,
        ':classroom_code' => $classroom_code,
        ':teacher_id' => $user_email,
        ':section' => $section,
        ':subject' => $subject,
        ':room' => $room,
    ]);

    return $statement->rowCount() > 0;
}
