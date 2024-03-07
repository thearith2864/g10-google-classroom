<?php
// require "database/database.php";
function createAssignment (string $tile, string $Instruction, $files, $class, int $point,string $date, $topic, string $date_create,string $assigment){
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
function createMaterial (string $tile, string $Instruction, $files, $class, string $topic, string $type){
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

 function selectidAssignment (string $class){
    global $connection;
    $statement = $connection -> prepare ('SELECT * FROM classrooms WHERE classroom_name = :classroom_name');
    $statement->execute([
        ':classroom_name' => $class     
    ]);
    if($statement-> rowCount() > 0){
        return $statement->fetch();
    }else{
        return[];
    }
 }
 function selectidInclass ( $code){
    global $connection;
    $statement = $connection -> prepare ('SELECT * FROM classrooms WHERE classroom_code = :classroom_code');
    $statement->execute([
        ':classroom_code' => $code     
    ]);
    if($statement-> rowCount() > 0){
        return $statement->fetch();
    }else{
        return[];
    }
 }

 function displayAllClass(){
    global $connection;
    $statement = $connection -> prepare ("SELECT classroom_name FROM classrooms");
    $statement->execute();
    return $statement->fetchAll();
 }

 function checkassignment($classId){
    global $connection;
    $statement = $connection -> prepare ("SELECT * FROM classworks WHERE classroom_id = :classroom_id");
    $statement->execute([
        ':classroom_id' => $classId
    ]);
    return $statement->fetchAll();
 }
 
 function displayAlltopics(){
    global $connection;
    $statement = $connection -> prepare ("SELECT * FROM topics");
    $statement->execute();
    return $statement->fetchAll();
 }
 function selectidtopic ( $name_topic){
    global $connection;
    $statement = $connection -> prepare ('SELECT * FROM topics WHERE topic_name = :topic_name');
    $statement->execute([
        ':topic_name' => $name_topic     
    ]);
    if($statement-> rowCount() > 0){
        return $statement->fetch();
    }else{
        return[];
    }
 }

 function Deleteassignment($classwork_id){
    global $connection;
    $stetement = $connection->prepare ('DELETE FROM classworks WHERE classwork_id = :classwork_id');
    $stetement->execute([
        ':classwork_id' => $classwork_id
    ]);
    return $stetement->rowCount() > 0;
 }

 function selectAssignment ($assignment_id){
    global $connection;
    $statement = $connection -> prepare('SELECT * FROM classworks WHERE classwork_id =:classwork_id');
    $statement->execute([
        ':classwork_id' => $assignment_id
    ]);
    if($statement-> rowCount() > 0){
        return $statement->fetch();
    }else{
        return[];
    }
 }

 function Updateassignment ($title, $Instructio, $create_date, $point, $id_classwork, $dateline){
    global $connection;
    $statement = $connection -> prepare('UPDATE classworks SET title  = :title, instruction = :instruction, point = :point, create_date = :create_date, dateline = :dateline WHERE classwork_id = :classwork_id');
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

 function choosessignment($Id){
    global $connection;
    $statement = $connection -> prepare ("SELECT * FROM classworks WHERE classwork_id = :classwork_id");
    $statement->execute([
        ':classwork_id' => $Id
    ]);
    return $statement->fetchAll();
 }
 function insertcomment ( int $classwork_id, int $user_id, string $comment, string $time):bool {
    global $connection;
    $stetement = $connection->prepare("insert into class_work_comments (user_id, classwork_id, comments, time_comment) values(:user_id, :classwork_id, :comments, :time_comment)");
    $stetement->execute([
        ':user_id' => $user_id,
        ':classwork_id' => $classwork_id,
        ':comments' => $comment,
        ':time_comment' => $time
    ]);
    return $stetement->rowCount() > 0;
 }

 function checkcomment ($idclasswork){
    global $connection;
    $stetement = $connection -> prepare('SELECT * FROM classworks WHERE classwork_id = :classwork_id');
    $stetement->execute([
        ':classwork_id' => $idclasswork
    ]);
    return $stetement->fetchAll();
 }
 
 function displayCM(){
    global $connection;
    $statement = $connection -> prepare ("  select comment_id, time_comment, comments, file_work, user_name, image_url from class_work_comments CM  inner join classworks CK on CM.classwork_id = CK.classwork_id inner join classrooms CR on CR.classroom_id = CK.classroom_id inner join users U on CM.user_id = U.user_id ");
    $statement->execute();
    return $statement->fetchAll();
 }

 function DeleteCM (int $idcomment, string $comment){
    global $connection;
    $stetement = $connection->prepare('UPDATE class_work_comments set comments =:comments WHERE comment_id = :comment_id');
    $stetement->execute([
        ':comments' => $comment,
        ':comment_id' => $idcomment
    ]);
    return $stetement->rowCount() > 0;
 }
 function deleteComment(int $comment_id){
    global $connection;
    $stetement = $connection->prepare('DELETE FROM class_work_comments WHERE comment_id = :comment_id');
    $stetement->execute([
        ':comment_id' => $comment_id
    ]);
    return $stetement->rowCount() >0;
 }

 function InsertCoverImage ($codeClass, $cover_image){
    echo $codeClass;
    echo $cover_image;
    global $connection;
    $stetement = $connection->prepare("UPDATE classrooms set  cover_image = :cover_image where classroom_code = :classroom_code");
    $stetement->execute([
        ':cover_image' => $cover_image,
        ':classroom_code' => $codeClass
    ]);
    return $stetement-> rowCount() > 0 ;    

 }
 function chooseCoverImage ($Idclass){
    global $connection;
    $stetement = $connection->prepare('SELECT cover_image FROM classrooms WHERE classroom_code = :classroom_code');
    $stetement->execute([
        ':classroom_code' => $Idclass
    ]);
    return $stetement->fetchAll();
 }
 function get_user_id() {
    global $connection;
    $user_email = $_SESSION['email'];
    $statement = $connection->prepare("SELECT user_id FROM users WHERE user_email = :user_email");
    $statement->execute([
        ':user_email' => $user_email
    ]);
    $result = $statement->fetch();
    return $result['user_id'];
}

function submit_classwork(int $classwork_id, int $user_id, string $file_work, string $date) {
    echo $classwork_id . "---";
    echo $user_id. '----';
    echo $file_work. "-----";
    echo $date . "------";

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
