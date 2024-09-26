<?php 

if (!function_exists('joinClass')){
    function joinClass(string $classroom_code, string $user_email): bool {
        global $connection;
        $statement = $connection->prepare("INSERT INTO classroommembers (classroom_code, user_email) VALUES (:classroom_code, :user_email)");
        $statement->execute([
            ':classroom_code' => $classroom_code,
            ':user_email' => $user_email
        ]);
        return $statement->rowCount() > 0;
    }
}

if (!function_exists('displayJoinClass')){
    function displayJoinClass() {
        global $connection;
        if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    
            $user_email = $_SESSION['email'];
            $statement = $connection->prepare("SELECT c.classroom_name, c.classroom_code, c.section, c.subject, c.room, u.user_name
            FROM classrooms AS c
            INNER JOIN classroommembers AS cm ON c.classroom_code = cm.classroom_code
            INNER JOIN users AS u ON cm.user_email = u.user_email
            WHERE cm.user_email = :user_email AND (archived <> 1 OR archived IS NULL)");
            $statement->execute(
                [':user_email'=> $user_email]
            );
            return $statement->fetchAll();
        }
    }
}

if (!function_exists('get_class_owners')){
    function get_class_owners() {
        global $connection;
        $statement = $connection->prepare('SELECT * FROM class_owners');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('selectstudent')){
    function selectstudent ($classcode) {
        global $connection;
        $stetement = $connection-> prepare('select * from classroommembers CB inner join users UR on CB.user_email = UR.user_email WHERE classroom_code = :classroom_code');
        $stetement-> execute([
            ':classroom_code' => $classcode
        ]);
        return $stetement->fetchAll();
    }
}

if (!function_exists('getteacher')){
    function getteacher ($classcodes) {
        global $connection;
        $stetemet = $connection-> prepare('select user_name, image_url, classroom_code from classrooms CS inner join users US on CS.user_email = US.user_email where classroom_code = :classroom_codes');
        $stetemet->execute([
            ':classroom_codes' => $classcodes
        ]);
        return $stetemet -> fetchAll();
    }
}

if (!function_exists('RemoveStudent')){
    function RemoveStudent ( $id){
        global $connection;
        $stetement = $connection-> prepare ('DELETE FROM classroommembers WHERE classroommember_id = :classroommember_id');
        $stetement->execute([
            ':classroommember_id' => $id
        ]);
        return $stetement->rowCount() >0;
    }
}

// upload----------
if (!function_exists('uploadProfile')){
    function uploadProfile($email, $img){
        global $connection;
        $statement = $connection->prepare("update users set image_url = :img where user_email = :email");
        $statement->execute([
            ':img'=>$img,
            ':email'=>$email
        ]);
    }
}

if (!function_exists('getProfile')){
    function getProfile($email){
        global $connection;
        $statement = $connection->prepare("select image_url from users where user_email = :email");
        $statement->execute([':email'=> $email]);
        return $statement->fetchAll();
    }
}

if (!function_exists('selectclasjoin')){
    function selectclasjoin ($user_ID){
        global $connection;
        $stetement = $connection->prepare(' SELECT * from classroommembers CR inner join classrooms CM on CR.classroom_code = CM.classroom_code inner join users US on CR.user_email = US.user_email WHERE user_id = :user_id');
        $stetement->execute([
            ':user_id' => $user_ID
        ]);
        return $stetement->fetchAll();
    }
}

if (!function_exists('showAssignment')){
    function showAssignment (){
        global $connection;
        $stetement = $connection->prepare('SELECT * FROM classworks');
        $stetement->execute();
        return $stetement->fetchAll();
    
    }
}

if (!function_exists('workdone')){
    function workdone ($user_id){
        global $connection;
        $stetement = $connection->prepare('select * from submit_classworks  WHERE user_id = :user_id');
        $stetement->execute([
            'user_id' => $user_id
        ]);
        return $stetement->fetchAll();
    
    }
}
if (!function_exists('get_assignment')){
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
}

if (!function_exists('insertscore')){
    function insertscore ($submit_id, $score){
        global $connection;
        $stetement = $connection->prepare('UPDATE submit_classworks SET score = :score   WHERE submit_id = :submit_id');
        $stetement->execute([
            ':score' => $score,
            ':submit_id' => $submit_id
        ]);
        return $stetement-> rowCount() > 0 ;  
    }
}

if (!function_exists('checkclassinvite')){
    function checkclassinvite(){
        global $connection;
        $stetement = $connection -> prepare('SELECT * from invite invite inner join users user on invite.teacher_id = user.user_id ');
        $stetement->execute(
        );
        return $stetement->fetchAll();
    }
}
if (!function_exists('deleteInvite')){
    function deleteInvite ($id){
       global $connection;
       $stetement = $connection->prepare('DELETE FROM invite WHERE invite_id = :invite_id');
       $stetement->execute([
        ':invite_id' => $id
       ]);
       return $stetement->rowCount() > 0;
    
    }
}
if (!function_exists('checkmember')){
    function checkmember ($student){
        global $connection;
        $stetement = $connection->prepare('select * from classroommembers WHERE user_email = :user_email');
        $stetement-> execute([
            ':user_email' => $student
        ]);
        return $stetement->fetchAll();
    }
}

if (!function_exists('countJoinClassroom')){
    function countJoinClassroom($user_email) {
        global $connection;
        $statement = $connection->prepare('SELECT COUNT(cm.classroom_code) FROM classroommembers AS cm WHERE cm.user_email = :user_email');
        $statement->execute([':user_email' => $user_email]);
        $result = $statement->fetch();
        return $result[0]; 
    }
}
// function selectclass($code){
//     global $connection;
//     $setement = $connection -> prepare('select * from classrooms where classroom_code = :classroom_code');
//     $setement -> execute([
//         ':classroom_code' => $code
//     ]);
//     return $setement ->fetchAll();
// }