<!-- Header START -->
<?php
if (!isset($_SESSION['user'])) {
    header('Location: /signin');
    exit(); 
}
?>
<!-- _____________________________________________-start form edit profle_________________________________________________ -->
<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="createTaskModalLabel"
aria-hidden="true">
<div class="modal-dialog"> 
	<div class="modal-content border border-success">
		<div class="modal-header bg-success">
			<h5 class="modal-title text-white" id="createTaskModalLabel">update your profile here</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
                        <div class="modal-body">
                            <!-- Task creation form -->
                            <form  enctype="multipart/form-data" action="../../controllers/Setting/upload_profile.controller.php" method="post">
                                <div class="mb-3">
                                    <label for="taskTitleInput" class="form-label">Inter your profile</label>
                                    <input type="file" class="form-control" id="taskTitleInput" required name="my_image">
                                </div>
                                
							</div>
							<div class="modal-footer">
								<button class="btn btn-success ">Update new</button>
									</form>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
<!-- __________________________________________________________________end edit profile ______________________________________- -->

<!-- _________________________________start form join class______________________________________________- -->

<div class="modal fade " id="form_join_class" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content border border-primary">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title text-white " id="createTaskModalLabel">Join Class by Class code</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Task creation form -->
				<form action="../../controllers/join_class/join_class.controller.php" method="post">
					<div class="form-group d-flex flex-column">
						<label for="classCode" class="mb-3">Ask your teacher for the class code, then enter it here.</label>
						<input type="text" class="form-control mb-4 w-100" name="classcode" id="classCode" placeholder="Class code">
					</div>
					<h5>To sign in with a class code</h5>
					<ul>
            <li>Use an authorized account</li>
            <li>Use a class code with 5-7 letters or numbers, and no spaces or symbols</li>
        </ul>
        <p>You need to make sure that I have input the right class code</p>
				</div>
				<div class="modal-footer ">
					<button type="submit" class="btn btn-primary align-self-end px-4">Join</button>
					<!-- <button type="button" class="btn btn-primary">Join Class</button> -->
				</form>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- _______________________________________________________________________________________________________for teacher create class______________________________________________- -->

<div class="modal fade" id="formteacher" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content border border-primary">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="createTaskModalLabel">Create New Class</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="createClassForm" action="../../controllers/create_class/create_class.controller.php" method="post">
			<div class="modal-body">
				<!-- Task creation form -->
				
			  	<div class="modal-body">
				  	<input type="text" id="className" class="form-control" name="className" placeholder="Class name (required)">
            		<span class="text-danger"><?php echo isset($_SESSION['error_classname']) ? $_SESSION['error_classname'] : ''; ?></span>
				</div>
				<div class="modal-body">
					<input type="text" id="section" class="form-control" name='section' placeholder="Section">
				</div>
				<div class="modal-body">
					<input type="text" id="subject" class="form-control" name='subject' placeholder="Subject">
				</div>
				<div class="modal-body">
					<input type="text" id="room" class="form-control" name='room' placeholder="Room">
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary align-self-end px-4">Create</button>
				
			</form>
				
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- ________________________________________________________________________end teacher create class_______________ -->

<header class="navbar-light navbar-sticky header-static">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container-fluid px-3 px-xl-5">
			<!-- Logo START -->
			<a class="navbar-brand" href="/home">
				<h3>
					<span class="text-danger">Google</span>
					<span>Classroom</span>
				</h3>
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

				<!-- Nav category menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto ms-5">


					<!--    _________________________________________________________________________    -->

					<!-- Nav item 3 Account -->
					<li class="nav-item dropdown ms-5">
						<a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classroom</a>
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item" href="/trainer-classroom"><i class="fas fa-user-tie fa-fw me-1 "></i>Teaching</a>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item" href="/trainer-student"><i class="fas fa-user-graduate fa-fw me-1"></i>Enrolled</a>
							</li>

							<li> <a class="dropdown-item" href="#"><i class="fas fa-user-cog fa-fw me-1"></i>Admin (Coming Soon)</a> </li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li> <a class="dropdown-item" href="/editprofile"><i class="fas fa-fw fa-cog me-1"></i>Settings</a> </li>
						</ul>
					</li>

					<!-- Nav item 4 Calendar-->
		
					<li class="nav-item"><a class="nav-link " href="/calendar">Calendar</a></li>
					<li class="nav-item"><a class="nav-link me-5" href="/todos">To-do</a></li>

					<!-- Nav item 5 link-->

				</ul>
				<!-- Nav Main menu END -->
				<div>
					<ul class="navbar-nav navbar-nav-scroll me-auto">
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" id="advanceMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-plus"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-end min-w-auto" data-bs-popper="none">
								<li>
										<a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#formteacher">
										<i class="text-warning fa-fw bi bi-life-preserver me-2"></i>Create class
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#form_join_class">
										<i class="text-danger fa-fw bi bi-card-text me-2"></i>Join class
									</a>
								</li>

							</ul>
						</li>
					</ul>
				</div>
				<!-- Nav Search START -->
				<div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
					<div class="nav-item w-100">
						<form class="position-relative" action="controllers/home/home.controller.php" method='post'>
							<input class="form-control pe-5 bg-transparent" id="searchclass" type="search" placeholder="Search" aria-label="Search">
							<button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
						</form>
					</div>
				</div>
				<!-- Nav Search END -->
			</div>
			<!-- Main navbar END -->
			<!-- Profile START -->
			<?php
			if (isset($_SESSION['user']) && isset($_SESSION['email']) && isset($_SESSION['image_url'])) {
				$user = $_SESSION['user'];
				$email = $_SESSION['email'];
				$image = $_SESSION['image_url']
			?>
				<div class="dropdown ms-1 ms-lg-0">
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<?php
						if(is_array($image)){
						?>
						<img class="avatar-img rounded-circle" src="assets/images/profiles/<?php echo $_SESSION['image_url']['image_url']?>" alt="avatar">
						<?php
						}else{
							?>
							<img class="avatar-img rounded-circle" src="assets/images/profiles/<?php echo $_SESSION['image_url']?>" alt="avatar">
							<?php
						}if($image == null){
							?>
							<img class="avatar-img rounded-circle" src="assets/images/profiles/g10-google-classroom.png" alt="avatar">
							<?php

						}
						?>
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
								<?php
						if(is_array($image)){
						?>
						
						<img class="avatar-img rounded-circle shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url']['image_url']?>" alt="Card image cap">
						<?php
						}else{
							?>
							
							<img class="avatar-img rounded-circle shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url']?>" alt="Card image cap">
							<?php
						}if($image == null){
							?>
							<img class="avatar-img rounded-circle shadow" src="assets/images/profiles/g10-google-classroom.png" alt="Card image cap">
							
							<?php

						}
						?>
								</div>
								<div>
									<div>
										<a class="h6" href="#"><?= $user[1] ?></a>
										<p class="small m-0"><?= $email ?></p>
									</div>
								</div>
								<hr>
						</li>

						<li>
							<div class="dropdown ms-1 ms-lg-0 ">
								<a class="avatar avatar-sm p-0" href="controllers/Setting/popup.controller.php" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
									<span class="dropdown-item">
										<i class="bi bi-person fa-fw me-2" data-bs-toggle="modal" data-bs-target="#edit_profile"> Edit Profile</i>
									</span>
								</a>
							</div>
						</li>

						<li><a class="dropdown-item" href="/editprofile"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="controllers/sognout/sign.controller.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						<!-- Dark mode switch START -->
						<!-- <li>
							<div class="modeswitch-wrap" id="darkModeSwitch">
								<div class="modeswitch-item">
									<div class="modeswitch-icon"></div>
								</div>
								<span>Dark mode</span>
							</div>
						</li> -->
						<!-- Dark mode switch END -->
					</ul>
				</div>
			<?php
			} 
			?>
			
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->



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
