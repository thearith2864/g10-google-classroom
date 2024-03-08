<!-- Header START -->
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <link href='/docs/dist/demo-to-codepen.css' rel='stylesheet' />
  <style>
    html, body {
      margin: 0;
      padding: 0;
      
    }
    #calendar {
      max-width: 100%;
      margin: 40px auto;
	  height: 40%;
    }
  </style>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <script src='/docs/dist/demo-to-codepen.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'UTC',
    initialView: 'dayGridWeek',
    headerToolbar: {
      left: 'prev,next',
      center: 'title',
      right: 'dayGridWeek,dayGridDay'
    },
    editable: true,
    events: [
      {
        title: 'Event 1',
        start: '2024-03-05',
      },
      {
        title: 'Event 2',
        start: '2024-03-05',
      },
      {
        title: 'Event 3',
        start: '2024-03-15',
      },
      {
        title: 'Event 4',
        start: '2024-03-20',
      }
    ],
    eventClick: function(info) {
      info.jsEvent.preventDefault(); // don't let the browser navigate

      if (info.event.url) {
        window.open(info.event.url);
      }
    }
  });

  calendar.render();
});
</script>
</head>
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
								<a class="dropdown-item" href="/join_classrooms"><i class="fas fa-user-graduate fa-fw me-1"></i>Enrolled</a>
							</li>

							<li> <a class="dropdown-item" href="#"><i class="fas fa-user-cog fa-fw me-1"></i>Admin (Coming Soon)</a> </li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li> <a class="dropdown-item" href="/editprofile"><i class="fas fa-fw fa-cog me-1"></i>Settings</a> </li>
							<li> <a class="dropdown-item" href="instructor-delete-account.html"><i class="fas fa-fw fa-trash-alt me-1"></i>Delete Profile</a> </li>
						</ul>
					</li>

					<!-- Nav item 4 Calendar-->
					<li class="nav-item dropdown dropdown-fullwidth">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Calendar</a>
						<div class="dropdown-menu dropdown-menu-end pb-0" data-bs-popper="none">
							<div class="row p-4 g-4">
								<!-- Dropdown column item -->


								<div class='demo-topbar'></div>
  								<div id='calendar'></div>


							
							</div>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link me-5" href="docs/alerts.html">To-do</a></li>

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
									<a class="dropdown-item" href="/create-class">
										<i class="text-warning fa-fw bi bi-life-preserver me-2"></i>Create class
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="/join_class">
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
				$image = $_SESSION['image_url'];
			?>
				<div class="dropdown ms-1 ms-lg-0">
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="../../assets/images/profiles/<?= $image ?>" alt="avatar">
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="../../assets/images/profiles/<?= $image ?>" alt="Card image cap">
								</div>
								<div>
									<div>
										<a class="h6" href="#"><?= $user[1] ?></a>
										<p class="small m-0"><?= $email ?></p>
									</div>
								</div>
								<hr>
						</li>
						<!-- Links -->

						<div class="dropdown ms-1 ms-lg-0">

							<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
								<span class="dropdown-item">
									<i class="bi bi-person fa-fw me-2" id="upload_profile">Edit Profile</i>
								</span>
							</a>
						</div>

						<li><a class="dropdown-item" href="/editprofile"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="controllers/sognout/sign.controller.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
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
			<?php
			} else {
				$user = $_SESSION['user'];
				$email = $_SESSION['email'];
			?>
				<div class="dropdown ms-1 ms-lg-0">
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="../../assets/images/profiles/g10-google-classroom.png" alt="avatar">
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="../../assets/images/profiles/g10-google-classroom.png" alt="Card image cap">
								</div>
								<div>
									<div>
										<a class="h6" href="#"><?= $user[1] ?></a>
										<p class="small m-0"><?= $email ?></p>
									</div>
								</div>
								<hr>
						</li>
						<!-- Links -->
						<li><a class="dropdown-item" href="#"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
						<li><a class="dropdown-item bg-danger-soft-hover" href="controllers/sognout/sign.controller.php"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
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
			<?php
			}
			?>
			<!-- Profile END -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->

<div id="contact-popup" style="display: none;">
	<form class="contact-form" id="" enctype="multipart/form-data" action="../../controllers/Setting/upload_profile.controller.php" method="post">
		<a href="/home" class="btn d-flex justify-content-end">✖</a>
		<h1>Upload Profile</h1>
		<div style="margin-top: 10px; margin-bottom: 10px;">
			<div>
				<input type="file" name="my_image" id="image">
			</div>
		</div>
		<div>
			<input type="submit" id="send" name="send" value="Upload" />
		</div>
	</form>
</div>

<?php
echo '<script src="views/home/searchClasses.view.js"></script>';
echo '<script>

let uploadProfile = document.querySelector("#upload_profile");
let popUp = document.querySelector("#contact-popup");
uploadProfile.addEventListener("click", ()=>{
	popUp.style.display = "block";
})

</script>'

?>