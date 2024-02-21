<?php
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
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

        $user_email = $_SESSION['email'];
        $statement = $connection->prepare("SELECT classroom_name, classroom_code, section, subject, room FROM classrooms WHERE user_email = :user_email");
        $statement->execute(
            [':user_email'=> $user_email]
        );
        return $statement->fetchAll();
    }
}

function deleteClass( $classroom_code) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classrooms where classroom_code =:classroom_code");
    $statement->execute([':classroom_code' => $classroom_code]);
    return $statement->rowCount() > 0;

}