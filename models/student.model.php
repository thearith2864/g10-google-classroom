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

function displayJoinClass() {
    global $connection;
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

        $user_email = $_SESSION['email'];
        $statement = $connection->prepare("SELECT c.classroom_name, c.classroom_code, c.section, c.subject, c.room, u.user_name
        FROM classrooms AS c
        INNER JOIN classroommembers AS cm ON c.classroom_code = cm.classroom_code
        INNER JOIN users AS u ON cm.user_email = u.user_email
        WHERE cm.user_email = :user_email;");
        $statement->execute(
            [':user_email'=> $user_email]
        );
        return $statement->fetchAll();
    }
}

function get_class_owners() {
    global $connection;
    $statement = $connection->prepare('SELECT * FROM class_owners');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function selectstudent ($classcode) {
    global $connection;
    $stetement = $connection-> prepare('select classroommember_id, classroom_code, user_name, image_url from classroommembers CB inner join users UR on CB.user_email = UR.user_email WHERE classroom_code = :classroom_code');
    $stetement-> execute([
        ':classroom_code' => $classcode
    ]);
    return $stetement->fetchAll();
}

function getteacher ($classcodes) {
    global $connection;
    $stetemet = $connection-> prepare('select user_name, image_url, classroom_code from classrooms CS inner join users US on CS.user_email = US.user_email where classroom_code = :classroom_codes');
    $stetemet->execute([
        ':classroom_codes' => $classcodes
    ]);
    return $stetemet -> fetchAll();
}

function RemoveStudent ( $id){
    global $connection;
    $stetement = $connection-> prepare ('DELETE FROM classroommembers WHERE classroommember_id = :classroommember_id');
    $stetement->execute([
        ':classroommember_id' => $id
    ]);
    return $stetement->rowCount() >0;
}

// upload----------
function uploadProfile($email, $img){
    global $connection;
    $statement = $connection->prepare("update users set image_url = :img where user_email = :email");
    $statement->execute([
        ':img'=>$img,
        ':email'=>$email
    ]);
}

function getProfile($email){
    global $connection;
    $statement = $connection->prepare("select image_url from users where user_email = :email");
    $statement->execute([':email'=> $email]);
    return $statement->fetchAll();
}

function get_assignment (){
    global $connection;
    $user_email = $_SESSION['email'];
    $statement = $connection->prepare('SELECT cw.title, cw.dateline, c.classroom_code
    FROM classworks cw
    INNER JOIN classrooms c ON cw.classroom_id = c.classroom_id
    INNER JOIN classroommembers cm ON c.classroom_code = cm.classroom_code
    INNER JOIN classrooms c2 ON cm.classroom_code = c2.classroom_code
    WHERE cm.user_email = :user_email ');
    $statement->execute(
        [':user_email'=> $user_email]
    );
    return $statement->fetchAll();
}
