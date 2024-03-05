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

