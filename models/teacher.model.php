<?php
if (!function_exists('createClass')) {
    function createClass(string $classroom_name, string $classroom_code, string $section, string $subject, string $room, string $user_email): bool
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
}


if (!function_exists('displayClass')) {
    function displayClass()
    {
        global $connection;
        if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            $user_email = $_SESSION['email'];
            $statement = $connection->prepare("SELECT classroom_name, classroom_code, section, subject, room FROM classrooms WHERE user_email = :user_email AND (archived <> 1 OR archived IS NULL)");
            $statement->execute([
                ':user_email' => $user_email,
            ]);
            return $statement->fetchAll();
        }
    }
}

if (!function_exists('get_enrolled')) {
    function get_enrolled(){
        global $connection;
        $statement = $connection->prepare('SELECT classroom_code , COUNT(classroom_code) FROM `classroommembers` GROUP BY classroom_code');
        $statement ->execute();
        return $statement->fetchAll();
    }
}

if (!function_exists('deleteClass')){
    function deleteClass( $classroom_code) : bool
    {
        global $connection;
        $statement = $connection->prepare("delete from classrooms where classroom_code =:classroom_code");
        $statement->execute([':classroom_code' => $classroom_code]);
        return $statement->rowCount() > 0;
    
    }
}

if (!function_exists('leaveInclass')){
    function leaveInclass( $classroom_code) : bool
    {
        global $connection;
        $statement = $connection->prepare("delete from classroommembers where classroom_code =:classroom_code");
        $statement->execute([':classroom_code' => $classroom_code]);
        return $statement->rowCount() > 0;
    
    }
}

if (!function_exists('updateClasses')){
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
}

if (!function_exists('updateClass')){
    function updateClass ($code){
        global $connection;
        $statement = $connection->prepare('select * from classrooms where classroom_code = :classroom_code');
        $statement->execute([
            ':classroom_code' => $code
        ]);
        return $statement->fetch();
    }
}

if (!function_exists('getClass')){
    function getClass($name)
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM classrooms WHERE classroom_name = :name AND (archived <> 0 OR archived IS NULL)");
        $statement->bindParam(':name', $name);
        $statement->execute();
        return $statement->fetch();
    }
}

if (!function_exists('selectEmail')){
    function selectEmail ($email){
        global $connection;
        $stetement = $connection ->prepare('select * from users where user_email = :user_email');
        $stetement-> execute([
            ':user_email' => $email
        ]);
        return $stetement-> fetchAll();
    };
}
if (!function_exists('inviteStudent')){
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
}

if (!function_exists('checkc')){
    function checkc(){
        global $connection;
        $stetement = $connection -> prepare('SELECT * from invite invite inner join users user on invite.teacher_id = user.user_id ');
        $stetement->execute(
        );
        return $stetement->fetchAll();
    }
}

if (!function_exists('chooseTeacher')){
    function chooseTeacher(){
        global $connection;
        $stetement = $connection-> prepare('SELECT * FROM classrooms CS INNER JOIN users US ON CS.user_email = US.user_email ');
        $stetement->execute();
        return $stetement->fetchAll();
    }
}

if (!function_exists('countClassroom')){
    function countClassroom($user_email) {
        global $connection;
        $statement = $connection->prepare('SELECT COUNT(classroom_id) FROM classrooms WHERE user_email = :user_email');
        $statement->execute([':user_email' => $user_email]);
        $result = $statement->fetch();
        return $result[0]; 
    }
}

if (!function_exists('countStudent')){
    function countStudent($user_email){
        global $connection;
        $statement = $connection->prepare('SELECT COUNT(cr.classroom_code) FROM classroommembers AS cr INNER JOIN classrooms AS c ON cr.classroom_code = c.classroom_code WHERE c.user_email = :user_email');
        $statement->execute([':user_email' => $user_email]);
        $result = $statement->fetch();
        return $result[0]; 
    }
}

if (!function_exists('countUsers')){
    function countUsers(){
        global $connection;
        $statement = $connection->prepare('SELECT COUNT(user_id) FROM users');
        $statement->execute();
        $result = $statement->fetch();
        return $result[0]; 
    }
}
if (!function_exists('countClass')){
    function countClass(){
        global $connection;
        $statement = $connection->prepare('SELECT COUNT(classroom_id) FROM classrooms');
        $statement->execute();
        $result = $statement->fetch();
        return $result[0]; 
    }
}
