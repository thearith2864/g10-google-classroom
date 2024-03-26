<?php
session_start();        
require "../../database/database.php";
require "../../models/assignment_model.php";
require "../../models/student.model.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['score'])){
    $score = $_POST['score'];
    $work_id = $_POST['submit_id'];
    $assignment_id = $_POST['ass_id'];
    $code = $_POST['code'];
    $user_id = $_POST['user_id'];
    $insert = insertscore ($work_id, $score);
    if (isset($_SESSION['email'])){
        echo "love";
            $teacher_email = $_SESSION['email'];
            $student_email = $_POST['email_student'];
            $user = $_SESSION['user']['user_name'];
        $url_link = 'http://localhost:3000/submit-form?id='. $assignment_id . '&codeclass=' . $code ;
        $mail = new PHPMailer(true);

        try {
            echo "yes";
            //Server settings
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'thearithclassroom@gmail.com';                     
            $mail->Password   = 'gjec rvuz uqbi cbvk';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    

            //Recipients
            $mail->setFrom($_POST['email_student'], $teacher_email);
            $mail->addAddress($_POST['email_student']);    

            //Content
            $mail->isHTML(true);                               
            $mail->Subject = 'give your score';
            $mail->Body    = $user.' is submit a folder into the classwork name '. $classwork_name . '. Click <a href="' . $url_link . '">here</a> to access the link.';                  
            $mail->AltBody = $user. ' is submit a folder into the classworkname '. $classwork_name . '. Click <a href="' . $url_link . '">here</a> to access the link.';
            $mail->send();
            echo 'Message has been sent';
            header('location: /detait_assignment?id=' . $assignment_id . "&codeclass=" . $code . "&user_id=" . $user_id);
        } catch (Exception $e) {
            echo "no";
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    }}
    
