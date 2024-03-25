<?php
require('models/teacher.model.php');
require('models/student.model.php');
if (!isset($_SESSION['user'])) {
    header('Location: /signin');
    exit(); 
}
?>
<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createTaskModalLabel">Update Your profile here</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Task creation form -->
				<form enctype="multipart/form-data" action="../../controllers/Setting/upload_profile.controller.php" method="post">
					<div class="mb-3">
						<label for="taskTitleInput" class="form-label">Inter your profile</label>
						<input type="file" class="form-control" id="taskTitleInput" required name="my_image">
					</div>

			</div>
			<div class="modal-footer">
				<button class="btn btn-primary ">Update new</button>
				</form>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<header class="navbar-light navbar-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="/home">
				<h3>
					<span class="text-danger">Google</span>
					<span>Classroom</span>
				</h3>
				<!-- <img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo"> -->
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse w-100 collapse" id="navbarCollapse">

				<!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll ms-3">
					<!-- Nav item 1 Demos -->
					<li class="nav-item"><a class="nav-link ms-5" href="/home">Home</a></li>

					<!-- Nav item 2 Pages -->


					<!-- Nav item 3 Account -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classroom</a>
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item" href="/trainer-classroom"><i class="fas fa-user-tie fa-fw me-1 "></i>Teaching</a>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item" href="/trainer-student	"><i class="fas fa-user-graduate fa-fw me-1"></i>Enrolled</a>
							</li>

							<li> <a class="dropdown-item" href="#"><i class="fas fa-user-cog fa-fw me-1"></i>Admin (Coming Soon)</a> </li>
							<li>
								<hr class="dropdown-divider">
							</li>

							<li> <a class="dropdown-item" href="/editprofile"><i class="fas fa-fw fa-cog me-1"></i>Settings</a> </li>
						</ul>
					</li>

					<!-- Nav item 4 Component-->
					<li class="nav-item"><a class="nav-link me-3" href="/to-review">To review</a></li>
					<div class='ms-5 me-4'></div>



				</ul>
				<!-- Nav Main menu END -->

			</div>
			<!-- Main navbar END -->
			<?php
			if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
				$user = $_SESSION['user'];
				$email = $_SESSION['email'];
				$image = $_SESSION['image_url']
			?>
				<!-- Profile START -->
				<div class="dropdown me-1 ms-lg-0">
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<!-- ---------------------------------------start image profile 1 ---------------------------------- -->
						<?php
						if (is_array($image)) {
						?>
							<img class="avatar-img rounded-circle" src="assets/images/profiles/<?php echo $_SESSION['image_url']['image_url'] ?>" alt="avatar">
						<?php
						} else {
						?>
							<img class="avatar-img rounded-circle" src="assets/images/profiles/<?php echo $_SESSION['image_url'] ?>" alt="avatar">
						<?php
						}
						if ($image == null) {
						?>
							<img class="avatar-img rounded-circle" src="assets/images/profiles/g10-google-classroom.png" alt="avatar">
						<?php
						}
						?>
						<!-- ---------------------------end image profile -------------------------------------- -->
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<!-- ---------------------start iamge profile 2---------------------------- -->
									<?php
									if (is_array($image)) {
									?>

										<img class="avatar-img rounded-circle shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url']['image_url'] ?>" alt="avatar">
									<?php
									} else {
									?>
										<img class="avatar-img rounded-circle shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url'] ?>" alt="avatar">

									<?php
									}
									if ($image == null) {
									?>
										<img class="avatar-img rounded-circle shadow" src="assets/images/profiles/g10-google-classroom.png" alt="avatar">
									<?php
									}
									?>
									<!-- ------------------------------------------- end image profile ------------------------- -->
								</div>
								<div>
									<a class="h6" href="#"><?= $user[1] ?></a>
									<p class="small m-0"><?= $email ?></p>
								</div>
							</div>
							<hr>
						</li>
						<!-- Links -->
						<!-- Profile START -->
						<li>
							<div class="dropdown ms-1 ms-lg-0 ">
								<a class="avatar avatar-sm p-0" href="controllers/Setting/popup.controller.php" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
									<span class="dropdown-item">
										<i class="bi bi-person fa-fw me-2" data-bs-toggle="modal" data-bs-target="#edit_profile"> Edit Profile</i>
									</span>
								</a>
							</div>
						</li>

						<!-- Profile END -->
						<li><a class="dropdown-item" href="/editprofile"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="../../controllers/sognout/sign.controller.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<!-- Dark mode switch START -->
						<li>
							<div class="modeswitch-wrap" id="darkModeSwitch">
								<div class="modeswitch-item">
									<div class="modeswitch-icon"></div>
								</div>
								<span>Dark mode</span>
							</div>
						</li>
						<!-- Dark mode switch END -->
					</ul>
				</div>
				<!-- Profile START -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->
<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main Banner START -->
	<section class="pt-0 ">
		<!-- Main banner background image -->
		<div class="container-fluid px-0">
			<div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
			</div>
		</div>
		<div class="container mt-n4">
			<div class="row">
				<!-- Profile banner START -->
				<div class="col-12">
					<div class="card bg-transparent card-body p-0">
						<div class="row d-flex justify-content-between">
							<!-- Avatar -->
							<div class="col-auto mt-4 mt-md-0">
								<div class="avatar avatar-xxl mt-n3">
									<!-- ___________________________start image profile 3____________________________ -->
									<?php
									if (is_array($image)) {
									?>
										<img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url']['image_url'] ?>" alt="not found">
									<?php
									} else {
									?>
										<img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url'] ?>" alt="not found">
									<?php
									}
									if ($image == null) {
									?>
										<img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/profiles/g10-google-classroom.png" alt="not found">
									<?php
									}
									?>
									<!-- -----------------------------------end image profile ------------------------------------- -->
								</div>
							</div>
							<!-- Profile info -->
							<div class="col d-md-flex justify-content-between align-items-center mt-4">
								<div>
									<h1 class="my-1 fs-4"><?=$user[1] ?><i class="bi bi-patch-check-fill text-info small"></i></h1>
									<ul class="list-inline mb-0">
										<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
										<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0">
										<?php 
											$currentFile = $_SERVER['PHP_SELF'];
											if($currentFile == '/index.php/trainer-classroom'){
												$user_email = $_SESSION['email'];
												$result = countStudent($user_email) ;
												echo '<i class="fas fa-user-graduate text-orange me-2"></i>';
												echo $result;
												if($result == 1){
													echo ' Enrolled Student';
												}elseif($result > 1){
													echo ' Enrolled Students';
												}
											}
										?>
										</li>
										<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>
										<?php 
											$currentFile = $_SERVER['PHP_SELF'];
											if($currentFile == '/index.php/trainer-classroom'){
												$user_email = $_SESSION['email'];
												$result = countClassroom($user_email) ;
												echo $result;
												if($result == 1){
													echo ' Classroom';
												}elseif($result > 1){
													echo ' Classrooms';
												}
											}elseif($currentFile == '/index.php/trainer-student'){
												$user_email = $_SESSION['email'];
												$result = countJoinClassroom($user_email) ;
												echo $result;
												if($result == 1){
													echo " Classroom's joined";
												}elseif($result > 1){
													echo " Classrooms' joined";
												}
											}
											?>
										</li>
									</ul>
								</div>
								<!-- Button -->
							</div>
						</div>
					</div>
					<!-- Profile banner END -->

					<!-- Advanced filter responsive toggler START -->
					<!-- Divider -->
					<hr class="d-xl-none">
					<div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
						<a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
						<button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
							<i class="fas fa-sliders-h"></i>
						</button>
					</div>
					<!-- Advanced filter responsive toggler END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Main Banner END -->

<?php
			}
?>
<!-- Profile START -->
</div>
</nav>
<!-- Logo Nav END -->
</header>
<!-- Header END -->
<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Inner part START -->
	<section class="pt-0">
		<div class="container">
			<div class="row">

				<!-- Right sidebar START -->
				<div class="col-xl-3">
					<!-- Responsive offcanvas body START -->
					<nav class="navbar navbar-light navbar-expand-xl mx-0">
						<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
							<!-- Offcanvas header -->
							<div class="offcanvas-header bg-light">
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
								<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>
							<!-- Offcanvas body -->
							<div class="offcanvas-body p-3 p-xl-0">
								<div class="bg-primary border rounded-3 pb-0 p-3 w-100">
									<!-- Dashboard menu -->
									<div class="list-group list-group-dark list-group-borderless">

										<a class="list-group-item d-flex" href="/home"><span class="material-symbols-outlined">home</span>Home</a>
										<a class="list-group-item d-flex" href="/calendar"><span class="material-symbols-outlined">calendar_month</span>Calendar</a>
										<a class="list-group-item d-flex" href="/trainer-classroom"><span class="material-symbols-outlined">cast_for_education</span>Teaching</a>
										<!-- <a class="list-group-item d-flex" href="/trainer-review"><span class="material-symbols-outlined">preview</span>Reviews</a> -->
										<a class="list-group-item d-flex" href="/trainer-student"><span class="material-symbols-outlined">school</span>Enrolled</a>
										<a class="list-group-item d-flex" href="/todos"><span class="material-symbols-outlined">
event_available
</span>To Do</a>
										<a class="list-group-item d-flex" href="/archived_classroom"><span class="material-symbols-outlined">
preview_off
</span></i>Archived classes</a>
										<!-- <a class="list-group-item text-danger bg-danger-soft-hover" href="/user-signin"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a> -->
									</div>
								</div>
							</div>
						</div>
					</nav>
					<!-- Responsive offcanvas body END -->
				</div>

				<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="createTaskModalLabel">Update Your profile here</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<!-- Task creation form -->
								<form enctype="multipart/form-data" action="../../controllers/Setting/upload_profile.controller.php" method="post">
									<div class="mb-3">
										<label for="image" class="form-label">Inter your profile</label>
										<input type="file" class="form-control" id="image" name="my_image">
									</div>

							</div>
							<div class="modal-footer">
								<button class="btn btn-primary ">Update new</button>
								</form>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>


				<?php
				// echo '<script src="views/home/searchClasses.view.js"></script>';
				?>