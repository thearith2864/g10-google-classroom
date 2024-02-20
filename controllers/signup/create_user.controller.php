<?php 
ini_set('session.cookie_lifetime', 86400);
session_start();
require "../../database/database.php";
require "../../models/sigup.model.php";
require "../../models/signin.model.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	if (isset($_FILES['my_image']))
	{
		$UserName = htmlspecialchars($_POST['username']);
		$Email = htmlspecialchars($_POST['email']);
		$PWD = htmlspecialchars($_POST['pwd']);	
	if($UserName !== ''){
		if($Email !== ''){
			if($PWD !== ''){
				if (strlen($PWD) > 8){					
				$passwordHash = password_hash($PWD, PASSWORD_BCRYPT);
				// __files image______________
				$img_name = $_FILES['my_image']['name'];
				$img_size = $_FILES['my_image']['size'];
				$tmp_name = $_FILES['my_image']['tmp_name'];
				$error = $_FILES['my_image']['error'];
				if ($error === 0) {
					if ($img_size > 125000) {
						echo "Sorry, your file is too large.";
					} else {
						$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
						$img_ex_lc = strtolower($img_ex);
						$allowed_exs = array("jpg", "jpeg", "png");
		
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
					// forget inter image__________
					header ("location: /signup");
				}
			}else{
				// PWD < 8_________________________

				header ("location: /signup");
			}
			}else{
				// PWD have not values___________________

				header ("location: /signup");
			}
		}else{
			// email have not values____________

			header ("location: /signup");
		}
	}else{
		// hove not inter values_____________________

	    header ("location: /signup");
	}	
}
}
