<?php
// require "database/database.php";
function createAssignment(string $tile, string $Instruction, $files, $class, int $point, string $date, $topic, string $date_create, string $assigment)
{
    global $connection;
    $statement = $connection->prepare("insert into classworks (classroom_id, work_type, title, instruction, file_work, point,  create_date, dateline, topic_id) values(:classroom_id, :work_type, :title, :instruction, :file_work, :point, :create_date, :dateline, :topic_id)");
    $statement->execute([
        ':classroom_id' => $class,
        ':work_type' => $assigment,
        ':title' => $tile,
        ':instruction' => $Instruction,
        ':file_work' => $files,
        ':point' => $point,
        ':create_date' => $date_create,
        ':dateline' => $date,
        ':topic_id' => $topic
    ]);
    return $statement->rowCount() > 0;
}
function createMaterial(string $tile, string $Instruction, $files, $class, string $topic, string $type)
{
    global $connection;
    $statement = $connection->prepare("insert into classworks (classroom_id, work_type, title, instruction, file_work, topic_id) values(:classroom_id, :work_type, :title, :instruction, :file_work, :topic_id)");
    $statement->execute([
        ':classroom_id' => $class,
        ':work_type' => $type,
        ':title' => $tile,
        ':instruction' => $Instruction,
        ':file_work' => $files,
        ':topic_id' => $topic
    ]);
    return $statement->rowCount() > 0;
}

function selectidAssignment(string $class)
{
    global $connection;
    $statement = $connection->prepare('SELECT * FROM classrooms WHERE classroom_name = :classroom_name');
    $statement->execute([
        ':classroom_name' => $class
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}
function selectidInclass($code)
{
    global $connection;
    $statement = $connection->prepare('SELECT * FROM classrooms WHERE classroom_code = :classroom_code');
    $statement->execute([
        ':classroom_code' => $code
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

function displayAllClass()
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM classrooms");
    $statement->execute();
    return $statement->fetchAll();
}

function checkassignment($classId)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM classworks WHERE classroom_id = :classroom_id");
    $statement->execute([
        ':classroom_id' => $classId
    ]);
    return $statement->fetchAll();
}

function displayAlltopics()
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM topics");
    $statement->execute();
    return $statement->fetchAll();
}
function selectidtopic($name_topic)
{
    global $connection;
    $statement = $connection->prepare('SELECT * FROM topics WHERE topic_name = :topic_name');
    $statement->execute([
        ':topic_name' => $name_topic
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

function Deleteassignment($classwork_id)
{
    global $connection;
    $stetement = $connection->prepare('DELETE FROM classworks WHERE classwork_id = :classwork_id');
    $stetement->execute([
        ':classwork_id' => $classwork_id
    ]);
    return $stetement->rowCount() > 0;
}

function selectAssignment($assignment_id)
{
    global $connection;
    $statement = $connection->prepare('SELECT * FROM classworks WHERE classwork_id =:classwork_id');
    $statement->execute([
        ':classwork_id' => $assignment_id
    ]);
    if ($statement->rowCount() > 0) {
        return $statement->fetch();
    } else {
        return [];
    }
}

function Updateassignment($title, $Instructio, $create_date, $point, $id_classwork, $dateline)
{
    global $connection;
    $statement = $connection->prepare('UPDATE classworks SET title  = :title, instruction = :instruction, point = :point, create_date = :create_date, dateline = :dateline WHERE classwork_id = :classwork_id');
    $statement->execute([
        ':title' => $title,
        'instruction' => $Instructio,
        ':point' => $point,
        'create_date' => $create_date,
        'dateline' => $dateline,
        ':classwork_id' => $id_classwork
    ]);
    return $statement->rowCount() > 0;
}

function choosessignment($Id)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM classworks WHERE classwork_id = :classwork_id");
    $statement->execute([
        ':classwork_id' => $Id
    ]);
    return $statement->fetchAll();
}
function insertcomment(int $classwork_id, int $user_id, string $comment, string $time): bool
{
    global $connection;
    $stetement = $connection->prepare("insert into class_work_comments (user_id, classwork_id, comments, time_comment) values(:user_id, :classwork_id, :comments, :time_comment)");
    $stetement->execute([
        ':user_id' => $user_id,
        ':classwork_id' => $classwork_id,
        ':comments' => $comment,
        ':time_comment' => $time
    ]);
    return $stetement->rowCount() > 0;
// <<<<<<< HEAD
// }
// =======
 }
 function insertcommentPrivate ( int $classwork_id, int $user_id, string $comment, string $time, $comment_user):bool {
    global $connection;
    $stetement = $connection->prepare("insert into class_work_comments (user_id, classwork_id, comments, time_comment, comment_user) values(:user_id, :classwork_id, :comments, :time_comment, :comment_user)");
    $stetement->execute([
        ':user_id' => $user_id,
        ':classwork_id' => $classwork_id,
        ':comments' => $comment,
        ':time_comment' => $time,
        'comment_user' => $comment_user
    ]);
    return $stetement->rowCount() > 0;
 }

function checkcomment($idclasswork)
{
    global $connection;
    $stetement = $connection->prepare('SELECT * FROM classworks WHERE classwork_id = :classwork_id');
    $stetement->execute([
        ':classwork_id' => $idclasswork
    ]);
    return $stetement->fetchAll();
}

function displayCM()
{
    global $connection;
// <<<<<<< HEAD
//     $statement = $connection->prepare("  select comment_id, time_comment, comments, file_work, user_name, image_url from class_work_comments CM  inner join classworks CK on CM.classwork_id = CK.classwork_id inner join classrooms CR on CR.classroom_id = CK.classroom_id inner join users U on CM.user_id = U.user_id ");
// =======
    $statement = $connection -> prepare ("  select * from class_work_comments CM  inner join classworks CK on CM.classwork_id = CK.classwork_id inner join classrooms CR on CR.classroom_id = CK.classroom_id inner join users U on CM.user_id = U.user_id ");
// >>>>>>> private_comment_teacher_with_student
    $statement->execute();
    return $statement->fetchAll();
}

function DeleteCM(int $idcomment, string $comment)
{
    global $connection;
    $stetement = $connection->prepare('UPDATE class_work_comments set comments =:comments WHERE comment_id = :comment_id');
    $stetement->execute([
        ':comments' => $comment,
        ':comment_id' => $idcomment
    ]);
    return $stetement->rowCount() > 0;
}
function deleteComment(int $comment_id)
{
    global $connection;
    $stetement = $connection->prepare('DELETE FROM class_work_comments WHERE comment_id = :comment_id');
    $stetement->execute([
        ':comment_id' => $comment_id
    ]);
    return $stetement->rowCount() > 0;
}

function InsertCoverImage($codeClass, $cover_image)
{
    echo $codeClass;
    echo $cover_image;
    global $connection;
    $stetement = $connection->prepare("UPDATE classrooms set  cover_image = :cover_image where classroom_code = :classroom_code");
    $stetement->execute([
        ':cover_image' => $cover_image,
        ':classroom_code' => $codeClass
    ]);
    return $stetement->rowCount() > 0;
}
function chooseCoverImage($Idclass)
{
    global $connection;
    $stetement = $connection->prepare('SELECT cover_image FROM classrooms WHERE classroom_code = :classroom_code');
    $stetement->execute([
        ':classroom_code' => $Idclass
    ]);
    return $stetement->fetchAll();
}
function get_user_id()
{
    global $connection;
    $user_email = $_SESSION['email'];
    $statement = $connection->prepare("SELECT user_id FROM users WHERE user_email = :user_email");
    $statement->execute([
        ':user_email' => $user_email
    ]);
    $result = $statement->fetch();
    return $result['user_id'];
}

function submit_classwork(int $classwork_id, int $user_id, string $file_work, string $date)
{

    global $connection;
    $statement = $connection->prepare('insert into submit_classworks (classwork_id, user_id, file_work, date) VALUES (:classwork_id, :user_id, :file_work, :date)');
    $statement->execute([
        ':classwork_id' => $classwork_id,
        ':user_id' => $user_id,
        ':file_work' => $file_work,
        ':date' => $date
    ]);
    return $statement->rowCount() > 0;
}

function chooseAssignmentStudent($idAssignment)
{
    global $connection;
    $stetement = $connection->prepare('SELECT * FROM submit_classworks WHERE classwork_id = :classwork_id');
    $stetement->execute([
        ':classwork_id' => $idAssignment
    ]);
    return $stetement->fetchAll();
}
function DeleteWork($idwork)
{
    global $connection;
    $stetement = $connection->prepare('DELETE FROM submit_classworks WHERE submit_id = :submit_id');
    $stetement->execute([
        ':submit_id' => $idwork
    ]);
    return $stetement->rowCount() > 0;
}
function findsubmit($classwork_id)
{
    global $connection;
    $stetement = $connection->prepare('SELECT * FROM submit_classworks where classwork_id = :classwork_id');
    $stetement->execute([
        ':classwork_id' => $classwork_id
    ]);
    return $stetement->fetchAll();
}
function selectStudentWork($user_id)
{
    global $connection;
    $stetement = $connection->prepare("select * from submit_classworks where user_id = :user_id");
    $stetement->execute([
        ':user_id' => $user_id
    ]);
    return $stetement->fetchAll();
}

function getTeacherEmail($classcodes)
{
    global $connection;
    $statement = $connection->prepare('select user_email from classrooms where classroom_code = :classroom_code');
    $statement->execute([
        ':classroom_code' => $classcodes
    ]);
    $result = $statement->fetch();

    if ($result) {
        return $result['user_email'];
    } else {
        return null;
    }
}

function getClassworkName($idwork)
{
    global $connection;
    $statement = $connection->prepare('select title from classworks where classwork_id  = :classwork_id');
    $statement->execute([
        ':classwork_id' => $idwork
    ]);
    $result = $statement->fetch();

    return $result['title'];
}



function getArchiveClassrooms()
{
    global $connection;


        $statement = $connection->prepare("SELECT classroom_name, classroom_code, section, subject, room,classroom_id FROM classrooms WHERE archived = 1");
        $statement->execute();
        return $statement->fetchAll();
    
}


function archiveClassroom($classroom_code)
{
    global $connection;
    $statement = $connection->prepare("UPDATE classrooms SET archived = 1 WHERE classroom_code = :classroom_code");
    $statement->execute([
        ':classroom_code' => $classroom_code
    ]);
    return $statement->rowCount() > 0;
}


function unArchiveClassroom($classroom_code)
{
    global $connection;
    $statement = $connection->prepare("UPDATE classrooms SET archived = 0 WHERE classroom_code = :classroom_code");
    $statement->execute([
        ':classroom_code' => $classroom_code
    ]);
    return $statement->rowCount() > 0;
}

function getStudentEmail($idclas){
    global $connection;
    $statement = $connection -> prepare('SELECT cm.user_email FROM classroommembers AS cm WHERE classroom_code = :idclass');
    $statement -> execute(
        [
            'idclass' => $idclas
        ]
        );
        $result = $statement -> fetchAll();
        return $result;
};
function classowner($code){
    global $connection;
    $stetement = $connection-> prepare('select * from classrooms CR inner join users US on CR.user_email = US.user_email where classroom_code = :classroom_code');
    $stetement->execute([
        ':classroom_code' => $code
    ]);
    return $stetement->fetchAll();
}
function select_topict(){
    global $connection;
    $stetement = $connection->prepare('select * from topics ');
    $stetement->execute();
    return $stetement->fetchAll();
}
function insert_topic($topic_name ,$topic, $classcode){
    global $connection;
    $stetement = $connection->prepare('insert into topics (topic_name, date,title, classroom_id) VALUES (:topic_name,:date,:topic, :classroom_id)');
    $stetement->execute([
        ':topic_name' => $topic_name,
        ':date' => date('Y-m-d H:i:s'),
        ':topic' => $topic,
        ':classroom_id' => $classcode
    ]);
    return $stetement->rowCount() > 0;
}
function deleteTopics($topic_id)
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM topics WHERE topic_id = :topic_id");
    $statement->execute([
        ':topic_id' => $topic_id,
    ]);
    return $statement->rowCount() > 0;
}


