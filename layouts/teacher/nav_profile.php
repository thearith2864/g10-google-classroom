<!-- Header START -->
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
								<a class="dropdown-item" href="/trainer-student"><i class="fas fa-user-graduate fa-fw me-1"></i>Enrolled</a>
							</li>

							<li> <a class="dropdown-item" href="#"><i class="fas fa-user-cog fa-fw me-1"></i>Admin (Coming Soon)</a> </li>
							<li>
								<hr class="dropdown-divider">
							</li>
							
							<li> <a class="dropdown-item" href="/editprofile"><i class="fas fa-fw fa-cog me-1"></i>Settings</a> </li>
						</ul>
					</li>

					<!-- Nav item 4 Component-->
					<li class="nav-item"><a class="nav-link me-3" href="docs/alerts.html">To review</a></li>
					<div class='ms-5 me-4'></div>



				</ul>
				<!-- Nav Main menu END -->
			</div>
			<!-- Main navbar END -->
			<?php
			// if (isset($_SESSION['user']) && isset($_SESSION['email']) && isset($_SESSION['image_url'])) {
				
			// 	$user = $_SESSION['user'];
			// 	$email = $_SESSION['email'];
				// $image = $_SESSION['image_url'];
			?>
				<!-- Profile START -->
				<div class="dropdown me-1 ms-lg-0">
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="../../assets/images/profiles/<?=$image['image_url'] ?>" alt="avatar">
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="../../assets/images/profiles/<?=$image['image_url']?>" alt="avatar">
								</div>
								<div>
									<a class="h6" href="#"><?= $user[1] ?></a>
									<p class="small m-0"><?= $email ?></p>
								</div>
							</div>
							<hr>
						</li>
						<!-- Links -->
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


			<?php
			// }
			?>