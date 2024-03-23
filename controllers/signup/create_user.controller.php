<?php 
ini_set('session.cookie_lifetime', 86400);
session_start();
require "../../database/database.php";
require "../../models/sigup.model.php";
require "../../models/signin.model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$UserName = htmlspecialchars($_POST['username']);
	$Email = htmlspecialchars($_POST['email']);
	$PWD = htmlspecialchars($_POST['pwd']);	
	if($UserName == ''){
		$_SESSION['error_username'] = 'UserName can not emty!';	
	}
	if($Email == ''){
		$_SESSION['error_email'] = 'please inter your Email!';
	}
	if($PWD == ''){
		$_SESSION['error_PWD'] = 'Please enter your password!';
	}
	if(strlen($PWD) < 8){
		$_SESSION['error_secure'] = 'Your password is not secure';
	    header ("location: /signup");
		exit;
	}
	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd'])){
	if (isset($_FILES['my_image']))
	{
				if (strlen($PWD) >= 8){					
				$passwordHash = password_hash($PWD, PASSWORD_BCRYPT);
				// __files image______________
				$img_name = $_FILES['my_image']['name'];
				$img_size = $_FILES['my_image']['size'];
				$tmp_name = $_FILES['my_image']['tmp_name'];
				$error = $_FILES['my_image']['error'];
				if ($error === 0) {
					if ($img_size < 5000) {
						echo "Sorry, your file is too small";
					} else {
						$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
						$img_ex_lc = strtolower($img_ex);
						$allowed_exs = array("jpg", "jpeg", "png" ,);
						if (in_array($img_ex_lc, $allowed_exs)) {
							$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
							$img_upload_path = '../../assets/images/profiles/' . $new_img_name;
							move_uploaded_file($tmp_name, $img_upload_path);
		
							// Insert into Database
							$iscreated = signUp($UserName, $passwordHash, $Email, $new_img_name);
							if ($isCreated) {
								header('Location: /signup');
							} else {
								header('Location: /signin');
							}
						} else {
							echo "User already exists";
						}
					}
				}
				else{
					// condition ddon't have image ___________________	
					$imgDefault = 'assets/images/profiles/g10-google-classroom.png';			
					$iscreated = signUpNotImage ($UserName, $passwordHash, $Email, $imgDefault);
					header ('location: /signin');
				}
			}
}
	}else{
		header('location: /signup');
	}
}
