<?php
session_start(); 

require "../../database/database.php";
require "../../models/assignment_model.php";
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php'; // Add this line

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP; // Add this line

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_FILES['file']) && isset($_POST['idAS'])){
        $codeclass = $_POST['idCS'];
        echo $codeclass;
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

                // Create a new PHPMailer instance
                $mail = new PHPMailer();

                // Set up SMTP configuration
                $mail->isSMTP(); // Use SMTP
                $mail->Host = 'smtp.example.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'your_email@example.com'; // Your email address used for SMTP authentication
                $mail->Password = 'your_email_password'; // Your email password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587; // TCP port to connect to

                // Set up email content
                $mail->setFrom('bhigh651@gmail.com', 'Your Name'); // Sender's email and name
                $mail->addAddress($_SESSION['$user_email'], 'Recipient Name'); // Recipient's email and name
                $mail->addCC('cc@example.com'); // Add CC recipient
                $mail->addBCC('bcc@example.com'); // Add BCC recipient
                $mail->Subject = 'Submit a file work'; // Email subject
                $mail->Body = 'Submit a file work'; // Email body
                $mail->AltBody = 'Submit a file work'; // Alternative plain text body if the recipient's email client doesn't support HTML

                // Send the email
                if (!$mail->send()) {
                    echo 'Email could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Email has been sent.';
                }

                header('location: /submit-form?id='. $idwork . '&codeclass=' . $codeclass);
            }
        }
    }else{ 
        $link = $_POST['link'];
        $idwork = $_POST['idAS'];
        $user_id = $_SESSION['user_id'];
        submit_classwork($idwork, $user_id['user_id'], $link, date('Y-m-d'));
        header('location: /submit-form?id='. $idwork . '&codeclass=' . $codeclass);
        
    }   
};

