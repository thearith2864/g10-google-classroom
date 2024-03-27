<?php
session_start();
require "../../database/database.php";
require "../../models/assignment_model.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$missingDateline = '';
if (empty($missingDateline)) {
    $missingDateline = date('Y-m-d H:i:s');
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    echo "yes";
    if (isset($_POST['title']) && isset($_POST['instruction']) && isset($_POST['date']) && isset($_POST['class']) && isset($_POST['topic']) && isset($_POST['point'])  && isset($_FILES['files'])) {
        $title = $_POST['title'];
        $Instruction = $_POST['instruction'];
        $date = $_POST['date'];
        echo $date;
        $class = $_POST['class'];
        $topic = $_POST['topic'];
        $point = $_POST['point'];
        $idclas = $_POST['ids'];
        $type = $_POST['type'];
        $topic = $_POST['topic'];
        $idtopic = selectidtopic($topic);
        $files = $_FILES['files'];
        $idclass = selectidAssignment($class);
        // -------------get assignment file--------------
        $fileAssignment = $_FILES['files']['name'];
        $file_size = $_FILES['files']['size'];
        $tmp_name = $_FILES['files']['tmp_name'];
        $error = $_FILES['files']['error'];
        //------------------condition---------------
        if ($error === 0) {
            $file_ex = pathinfo($fileAssignment, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            $allowed_exs = array("pdf", "zip", "xls", "doc", "txt");
            if (in_array($file_ex_lc, $allowed_exs)) {
                // echo $file_ex_lc;
                $new_file_name = uniqid("$fileAssignment", true) . '.' . $file_ex_lc;
                echo $new_file_name;
                $file_upload_path = '../../assets/files/assignment_files/' . $new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
                $isert = createAssignment($title, $Instruction, $new_file_name, $idclass[0], $point, $date, $idtopic[0], $missingDateline, $type);
                header('location: /class?id=' . $idclas);

                $studentEmail = getStudentEmail($idclas);
                if ($isert) { // Fixed variable name (changed $insert to $isert)
                    foreach ($studentEmail as $email) {
                        $teacher_email = $_SESSION['email'];
                        $student_email = $email['user_email'];
                        $user = $_SESSION['user']['user_name'];
                        $url_link = 'http://localhost:3000/student_classwork?id='. $idclas ;
                        
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->isSMTP();                                            
                            $mail->Host       = 'smtp.gmail.com';                     
                            $mail->SMTPAuth   = true;                                  
                            $mail->Username   = 'thearithclassroom@gmail.com';                   
                            $mail->Password   = 'gjec rvuz uqbi cbvk';                              
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                            $mail->Port       = 465;                                   

                            //Recipients
                            $mail->setFrom($teacher_email, $user);
                            $mail->addAddress($student_email);     

                            //Content
                            $mail->isHTML(true);                                  
                            $mail->Subject = 'Create a Assignment';
                            $mail->Body    = 'Teacher ' . $user . ' is created a classwork named ' . $title. ' on '. date('y-m-d'). '. Click <a href="' . $url_link . '">here</a> to access the link.';
                            $mail->AltBody = 'Teacher ' . $user . ' is created a classwork named ' . $title. ' on '. date('y-m-d'). '. Click <a href="' . $url_link . '">here</a> to access the link.';

                            $mail->send();
                            echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }
            }
        }
    } else {
        $title = $_POST['title'];
        $Instruction = $_POST['instruction'];
        $class = $_POST['class'];
        // $d  ate = $_POST['date'];
        $topic = $_POST['topic'];
        $idclas = $_POST['ids'];
        $type = $_POST['type'];
        $topic = $_POST['topic'];
        $idtopic = selectidtopic($topic);
        $files = $_FILES['files'];
        $idclass = selectidAssignment($class);
        // -------------get assignment file--------------
        $fileAssignment = $_FILES['files']['name'];
        $file_size = $_FILES['files']['size'];
        $tmp_name = $_FILES['files']['tmp_name'];
        $error = $_FILES['files']['error'];
        //------------------condition---------------
        if ($error === 0) {
            $file_ex = pathinfo($fileAssignment, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            $allowed_exs = array("pdf", "zip", "xls", "doc", "txt");
            if (in_array($file_ex_lc, $allowed_exs)) {
                // echo $file_ex_lc;
                $new_file_name = uniqid("$fileAssignment", true) . '.' . $file_ex_lc;
                echo $new_file_name;
                $file_upload_path = '../../assets/files/assignment_files/' . $new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
                $isert = createMaterial($title, $Instruction, $new_file_name, $idclass[0], $idtopic[0], $type);
                header('location: /class?id=' . $idclas);

                $studentEmail = getStudentEmail($idclas);
                if ($isert) { // Fixed variable name (changed $insert to $isert)
                    foreach ($studentEmail as $email) {
                        $teacher_email = $_SESSION['email'];
                        $student_email = $email['user_email'];
                        $user = $_SESSION['user']['user_name'];
                        $url_link = 'http://localhost:3000/student_classwork?id='. $idclas ;

                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->isSMTP();                                           
                            $mail->Host       = 'smtp.gmail.com';                     
                            $mail->SMTPAuth   = true;                                 
                            $mail->Username   = 'thearithclassroom@gmail.com';                    
                            $mail->Password   = 'gjec rvuz uqbi cbvk';                              
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
                            $mail->Port       = 465;                                   

                            //Recipients
                            $mail->setFrom($teacher_email, $user);
                            $mail->addAddress($student_email);    

                            //Content
                            $mail->isHTML(true);                                 
                            $mail->Subject = 'Create Assignment ';
                            $mail->Body    = 'Teacher ' . $user . ' is created a classwork named ' . $title. ' on '. date('y-m-d'). '. Click <a href="' . $url_link . '">here</a> to access the link.';
                            $mail->AltBody = 'Teacher ' . $user . ' is created a classwork named ' . $title. ' on '. date('y-m-d'). '. Click <a href="' . $url_link . '">here</a> to access the link.';

                            $mail->send();
                            echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }
            }
        }
    }
}
