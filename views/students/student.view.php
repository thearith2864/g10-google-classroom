<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content border border-primary">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white" id="createTaskModalLabel">Join Class by Class code</h5>
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
<div class="modal fade" id="message_student" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content border border-primary">
			<div class="modal-header">
				<h5 class="modal-title" id="createTaskModalLabel">Message someone invite in class</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!-- Task creation form -->
				<?php
				foreach ($invite as $teacher) {
					if ($_SESSION['user']['user_id'] == $teacher['student_id']) {
				?>
						<div class=" d-flex justify-content-between">
							<div class="d-flex">
								<img src="assets/images/profiles/<?= $teacher['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-2">
								<div style="width: 60%;">
									<h5><?= $teacher['user_name'] ?></h5>
									<p><?= $teacher['description'] ?></p>
								</div>
								<div style="width: 90px;">

									<p style="font-size: 10px;"><?= $teacher['date'] ?></p>
								</div>
							</div>
							<div class="d-flex " style="height: 29px;">
								<a href="controllers/join_class/join_class.controller.php?id=<?= $teacher['classroom_code'] ?>&iviteID=<?= $teacher['invite_id'] ?>"><button class="btn​ btn-primary" style="margin-right: 8px;">Joint</button></a>
								<a href="controllers/join_class/join_class.controller.php?iviteID=<?= $teacher['invite_id'] ?>"><button class="btn​ btn-gray">Reject</button></a>
							</div>
						</div>
				<?php
					}
				}
				?>
			</div>
			<div class="modal-footer bg-primary">

			</div>
		</div>
	</div>
</div>

<!-- Right sidebar END -->

<!-- Main content START -->
<div class="col-xl-9">
	<!-- Card START -->
	<div class="card border rounded-3">
		<!-- Card header START -->
		<div class="d-flex justify-content-between border-bottom">
			<div class="card-header ">
				<h3 class="mb-0">Enrolled</h3>
			</div>
			<!-- Card header END -->
			<div>
				<a href="" class="btn btn-danger h-50 m-3" data-bs-toggle="modal" data-bs-target="#createTaskModal">
					<i class="bi bi-plus-circle-fill m-2"></i>
					Join New Class
				</a>
				<button class=" btn">
					<i class="bi bi-envelope fa-2x " style="color: red;" data-bs-toggle="modal" data-bs-target="#message_student"></i>
					<?php
					$count = 0;
					foreach ($invite as $teacher) {
						if ($_SESSION['user']['user_id'] == $teacher['student_id']) {
							$count += 1;
					?>
					<?php
						}
					}
					?>
					<p style="margin-top: -45px; margin-left: 27px; width:25px;" class="bg-danger rounded-circle text-white"><?= $count ?></p>
				</button>
			</div>


		</div>
		<!-- Card header END -->

		<!-- Card body START -->
		<div class="card-body">

			<!-- Search and select START -->
			<div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
				<input class="form-control pe-5 bg-transparent" id="classSeacher" type="search" placeholder="Search">
			</div>
		</div>
		<!-- Search and select END -->

		<!-- Student list table START -->
		<div class="table-responsive border-0">
			<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
				<!-- Table head -->
				<thead>
					<tr>
						<th scope="col" class="border-0 rounded-start">Course Title</th>
						<th scope="col" class="border-0">Owner</th>
						<th scope="col" class="border-0">Subject</th>
						<th scope="col" class="border-0">Room</th>
						<th scope="col" class="border-0 rounded-end">Action</th>
					</tr>
				</thead>

				<!-- Table body START -->
				<?php

				if (is_array($join_classes)) :
					foreach ($join_classes as $class) :




				?>
						<tbody>
							<!-- Table item -->
							<tr id="card-show">
								<!-- Course item -->
								<td>
									<a href="/student_classwork?id=<?= $class['classroom_code'] ?>">
										<div class="d-flex align-items-center">
											<!-- Image -->
											<div class="w-100px">
												<img src="assets/images/courses/4by3/08.jpg" class="rounded" alt="">
											</div>
											<div class="mb-0 ms-2">
												<!-- Title -->
												<h6><?php echo $class['classroom_name'] ?></h6>
												<!-- Info -->
												<div class="d-sm-flex">
													<p class="h6 fw-light mb-0 small me-3"><i class="fas fa-table text-orange me-2"></i>18 lectures</p>
													<p class="h6 fw-light mb-0 small"><i class="fas fa-check-circle text-success me-2"></i>6 Completed</p>
												</div>
											</div>
										</div>

								</td>
								<!-- Enrolled item -->
								<td class="text-center text-sm-start"><?php
																		if (is_array($class_owner)) {
																			foreach ($class_owner as $owner) {
																				if ($owner['classroom_code'] == $class['classroom_code']) {
																					echo $owner['user_name'];
																				}
																			}
																		}

																		?></td>
								<!-- Status item -->
								<td>
									<div class="badge bg-success bg-opacity-10 text-success"><?php echo $class['subject'] ?></div>
								</td>
								<!-- Price item -->
								<td><?php echo $class['room'] ?></td>
								</a>
								<!-- Action item -->
								<td>

									<a id="leave_class" href="controllers/classroom/delete.classroom.controller.php?ids=<?php echo $class['classroom_code'] ?>" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></a>
									<script>
										let leave = document.querySelector("#leave_class");
										leave.addEventListener('click', leave_class);

										function leave_class() {
											alert('are you sure that leave this class');
										}
										let searchclass = document.querySelector('#classSeacher');
										searchclass.addEventListener('keyup', function(e) {
											let searchtext = searchclass.value.toLowerCase();
											let itemPost = document.querySelectorAll('#card-show');
											for (let posts of itemPost) {
												let titles = posts.children[0].children[0].children[0].children[1].children[0].textContent;
												if (titles.indexOf(searchtext) === -1) {
													posts.style.display = "none";
												} else {
													posts.style.display = "table-row";
												}
											}


										})
									</script>
								</td>
							</tr>

					<?php
					endforeach;
				endif;
					?>

						</tbody>
						<!-- Table body END -->
			</table>
		</div>
		<!-- Student list table END -->

		<!-- Pagination START -->
		<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
			<!-- Content -->
			<p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
			<!-- Pagination -->
			<nav class="d-flex justify-content-center mb-0" aria-label="navigation">
				<ul class="pagination pagination-sm pagination-primary-soft mb-0 pb-0">
					<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
					<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
					<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
					<li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
					<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
				</ul>
			</nav>
		</div>
		<!-- Pagination END -->
	</div>
	<!-- Card body START -->
</div>
<!-- Card END -->
</div>
<!-- Main content END -->
</div><!-- Row END -->
</div>
</section>
<!-- =======================
Inner part END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->