<?php
// require "database/database.php";
function createAssignment (string $tile, string $Instruction, $files, $class, int $point,string $date, $topic, string $date_create,string $assigment){
    echo $class .'--';
    echo $tile. '--';
    echo $Instruction. '--';
    echo $point . '--';
    echo $date. '--';
    echo $topic. '--';
    print_r ($files .'--');
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
 