<?php
session_start(); 

require "../../database/database.php";
require "../../models/assignment_model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_FILES['file']) && isset($_POST['idAS'])){
        $codeclass = $_POST['idCS'];
        $idwork = $_POST['idAS'];
        $user_id = $_SESSION['user_id'];
        $fileAssignment = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];
        if ($error === 0){
            $file_ex = pathinfo($fileAssignment, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            $allowed_exs = array("pdf", "zip", "xls", "doc", "txt");
            if (in_array($file_ex_lc, $allowed_exs)) {
                $new_file_name = uniqid("HOMEWORK"."$fileAssignment", true) . '.' . $file_ex_lc;
                $file_upload_path = '../../assets/files/Assignment_for_students_subment/' . $new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
                submit_classwork($idwork, $user_id['user_id'], $new_file_name, date('Y-m-d'));
                header('location: /submit-form?id='. $idwork . '&codeclass=' . $codeclass);

                if (isset($_SESSION['email']) ) {
                    $email = $_SESSION['email'];
                    $user = $_SESSION['user']['user_name'];
                    $teacher_email = getTeacherEmail($codeclass);
                    $classwork_name = getClassworkName($idwork);
                    $url_link = 'http://localhost:3000/detait_assignment?id='. $idwork . '&codeclass=' . $codeclass . "&user_id="  . $user_id;
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'thearithclassroom@gmail.com';                     //SMTP username
                        $mail->Password   = 'gjec rvuz uqbi cbvk';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        //Recipients
                        $mail->setFrom($email, $user);
                        $mail->addAddress($teacher_email);     //Add a recipient           
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Submit a file';
                        $mail->Body    = $user.' is submit a folder into the classwork name '. $classwork_name . '. Click <a href="' . $url_link . '">here</a> to access the link.';                  
                        $mail->AltBody = $user. ' is submit a folder into the classworkname '. $classwork_name . '. Click <a href="' . $url_link . '">here</a> to access the link.';
            
                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
                
            }
        }
    }else{ 
        $codeclass = $_POST['idCS'];
        $link = $_POST['link'];
        $idwork = $_POST['idAS'];
        $user_id = $_SESSION['user'];
        submit_classwork($idwork, $user_id['user_id'], $link, date('Y-m-d'));
        if (isset($_SESSION['email']) ) {
            $email = $_SESSION['email'];
            $user = $_SESSION['user']['user_name'];
            $teacher_email = getTeacherEmail($codeclass);
            $classwork_name = getClassworkName($idwork);
            $url_link = 'http://localhost:3000/detait_assignment?id='. $idwork . '&codeclass=' . $codeclass . "&user_id="  . $user_id['user_id'];
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'thearithclassroom@gmail.com';                     //SMTP username
                $mail->Password   = 'gjec rvuz uqbi cbvk';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom($email, $user);
                $mail->addAddress($teacher_email);     //Add a recipient
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Submit a link';
                $mail->Body    = $user.' is submit a link into the classwork name '. $classwork_name. '. Click <a href="' . $url_link . '">here</a> to access the link.';
                $mail->AltBody = $user.' is submit a link into the classwork name '. $classwork_name. '. Click <a href="' . $url_link . '">here</a> to access the link.';
    
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        header('location: /submit-form?id='. $idwork . '&codeclass=' . $codeclass);
        
    }   
}