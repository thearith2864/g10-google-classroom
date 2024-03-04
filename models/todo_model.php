<?php
function selectclass(){
    global $connection;
    $stetemrnt = $connection->prepare('select * from classrooms ');
    $stetemrnt->execute();
    return $stetemrnt->fetchAll();
}

function displayassignments($id){
    global $connection;
    $statement = $connection -> prepare ("SELECT * FROM classworks WHERE classroom_id = :classroom_id");
    $statement->execute([
        ':classroom_id' => $id
    ]);
    return $statement->fetch();
}
function displayassignmentsAll(){
    global $connection;
    $statement = $connection -> prepare ("SELECT * FROM classworks");
    $statement->execute();
    return $statement->fetchAll();
}

