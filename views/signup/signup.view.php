<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: /home');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>signup</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="E-Classroom">

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">

</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<section class="p-0 d-flex  align-items-center position-relative overflow-hidden">


			<!-- Right -->
			<div class="col-12 col-lg-6 m-auto">
				<div class="row my-5">
					<div class="col-sm-10 col-xl-8 m-auto">
						<!-- Title -->
						<span class="mb-0 fs-1">👋</span>
						<h1 class="fs-3">SignUp into Google Classroom!</h1>

						<!-- Form START -->
						<form action="controllers/signup/create_user.controller.php" method="post" enctype="multipart/form-data">
							<!-- User name -->
							<div class="mb-4">
								<label for="exampleInputEmail1" class="form-label">User Name *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
										<i class="bi bi-person-fill"></i>
									</span>
									<input type="text" class="form-control border-0 bg-light rounded-end ps-1" placeholder="User-name" name="username">
								</div>
								<span class="text-danger"><?php echo isset($_SESSION['error_username'])? $_SESSION['error_username']: ''; ?> </span>
							</div>
							<!-- Email  -->
							<div class="mb-4">
								<label for="exampleInputEmail1" class="form-label">Email address *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
										<i class="bi bi-envelope-fill"></i>
									</span>
									<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1" name="email">
								</div>
								<span class="text-danger"><?php echo isset($_SESSION['error_email'])? $_SESSION['error_email']: ''; ?> </span>
							</div>
							<!-- Password -->
							<div class="mb-4">
								<label for="inputPassword5" class="form-label">Password *</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
										<i class="fas fa-lock"></i>
									</span>
									<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5" name="pwd">
								</div>
								<span class="text-danger "><?php echo isset($_SESSION['error_PWD'])? $_SESSION['error_PWD']: ''; ?> </span>
								<span class="text-danger "><?php echo isset($_SESSION['error_secure'])? $_SESSION['error_secure']: ''; ?> </span>

								<div id="passwordHelpBlock" class="form-text">
									Your password must be 8 characters at least
								</div>
							</div>
							<div class="mb-4">
								<label for="inputPassword5" class="form-label">profile</label>
								<div class="input-group input-group-lg">
									<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
										<i class="bi bi-images"></i>
									</span>
									<input type="file" id="file" class="form-control border-0 bg-light rounded-end ps-1" name="my_image">
								</div>
								<div id="passwordHelpBlock" class="form-text">
								  You can be inter your personal profile or Not required
								</div>
							</div>
							<!-- Button -->
							<div class="d-flex justify-content-center">
								<div class="d-grid">
									<button class="btn btn-primary w-100">SignUp</button>
								</div>
								
							</div>
							<div class="d-flex justify-content-center p-2 align-items-center">
								<div class="d-grid d-flex">
								If you have an account? >	
									<a href="/signin" style="margin-left: 10px;">sign in</a>
								</div>
								
							</div>
							
						</form>
						<!-- Form END -->

					</div>
				</div> <!-- Row END -->
			</div>
			</div> <!-- Row END -->
			</div>
		</section>
	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Bootstrap JS -->
	<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Template Functions -->
	<script src="vendor/js/functions.js"></script>

</body>

</html>