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

function get_enrolled(){
    global $connection;
    $statement = $connection->prepare('SELECT classroom_code , COUNT(classroom_code) FROM `classroommembers` GROUP BY classroom_code');
    $statement ->execute();
    return $statement->fetchAll();
}
function deleteClass( $classroom_code) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classrooms where classroom_code =:classroom_code");
    $statement->execute([':classroom_code' => $classroom_code]);
    return $statement->rowCount() > 0;

}
function leaveInclass( $classroom_code) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from classroommembers where classroom_code =:classroom_code");
    $statement->execute([':classroom_code' => $classroom_code]);
    return $statement->rowCount() > 0;

}


function updateClasses ($classroom_name,  $section, $subject, $room, $id ): bool
{
    global $connection;
    $query = "UPDATE classrooms SET classroom_name = :classroom_name,  section = :section, subject = :subject, room = :room WHERE classroom_id = :classroom_id";
    $statement = $connection->prepare($query);
    $statement->execute([
        ':classroom_name' => $classroom_name,
        ':section' => $section,
        ':subject' => $subject,
        ':room' => $room,
        'classroom_id' => $id
        
    ]);

    return $statement->rowCount() > 0;
}

function updateClass ($code){
    global $connection;
    $statement = $connection->prepare('select * from classrooms where classroom_code = :classroom_code');
    $statement->execute([
        ':classroom_code' => $code
    ]);
    return $statement->fetch();
}


function getClass($name)
{
    global $connection;
    $statement = $connection->prepare("select * from classrooms where classroom_name = '$name'");
    $statement->execute();
    return $statement->fetch();
}
function selectEmail ($email){
    global $connection;
    $stetement = $connection ->prepare('select * from users where user_email = :user_email');
    $stetement-> execute([
        ':user_email' => $email
    ]);
    return $stetement-> fetchAll();
};
function inviteStudent($student, $teacher, $description, $code) {
    global $connection;
    
    $statement = $connection->prepare('INSERT INTO invite (teacher_id, student_id, description, classroom_code, date) VALUES (:teacher_id, :student_id, :description, :classroom_code, :date)');
    $statement->execute([
        ':teacher_id' => $teacher,
        ':student_id' => $student,
        ':description' => $description,
        ':classroom_code' => $code,
        ':date' => date('Y-m-d')

    ]);
    
    return $statement->rowCount() > 0;
}
function checkc(){
    global $connection;
    $stetement = $connection -> prepare('SELECT * from invite invite inner join users user on invite.teacher_id = user.user_id ');
    $stetement->execute(
    );
    return $stetement->fetchAll();
}

