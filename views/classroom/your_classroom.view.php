<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
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
			<!-- Right sidebar END -->

			<!-- Main content START -->
			<div class="col-xl-9">
				<!-- Card START -->
				<div class="card border rounded-3">
					<!-- Card header START -->
					<div class="d-flex justify-content-between border-bottom">
			<div class="card-header ">
				<h3 class="mb-0">My Classroom List</h3>
			</div>
			<!-- Card header END -->
			<button class="btn btn-primary h-50 m-3" data-bs-toggle="modal" data-bs-target="#createTaskModal">
				<i class="bi bi-plus-circle-fill m-2"></i>
				Cleate New Class
			</button>
		</div>
					<!-- Card header END -->
					<!-- Card body START -->
					<div class="card-body">

						<!-- Search and select START -->
						<div class="row g-3 align-items-center justify-content-between mb-4">
							<!-- Search -->

							<div class="col-md-8">
								<form class="rounded position-relative" action="controllers/classroom/search_classroom.controllers.php" method='post'>
									<input class="form-control pe-5 bg-transparent" id="search" type="search" placeholder="Search" aria-label="Search">
								</form>
							</div>

							
						</div>
						<!-- Search and select END -->
						<!-- Course list table START -->
						<div class="table-responsive-lg border-0">
							<table class=" table table-dark-gray align-middle p-4 mb-0 table-hover " >
								<!-- Table head -->
								<thead class="bg-dark " style="height: 50px; ">
									<tr>
										<th scope="col" class="border-0 rounded-start">Course Title</th>
										<th scope="col" class="border-0">Class code</th>
										<!-- <th scope="col" class="border-0">Enrolled</th> -->
										<th scope="col" class="border-0">Subject</th>
										<th scope="col" class="border-0">Room</th>
										<th scope="col" class="border-0 rounded-end">Action</th>
									</tr>
								</thead>

								<!-- Table body START -->
								<?php 
								// echo $h;
								if(is_array($classes)):
									foreach($classes as $class):
										
							
								?>	
								<a href="/class?id=<?=$class['classroom_code']?>">					
								<tbody >
									<!-- Table item -->
									<tr>
										<!-- Course item -->
										<td>
										<a href="/class?id=<?=$class['classroom_code']?>">
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
										<td class="text-center text-sm-start"><?php echo $class['classroom_code'] ?></td>
										<!-- <td class="text-center text-sm-start">
											</a>
										<?php 
											if (is_array($enrolleds)) {
												foreach ($enrolleds as $enrolle) {
													if ($class['classroom_code'] == $enrolle['classroom_code']) {
														echo $enrolle['COUNT(classroom_code)'];
													}
												}
											}
										?>
										</td> -->
										<!-- Status item -->
										<td>
											<div class="badge bg-success bg-opacity-10 text-success"><?php echo $class['subject'] ?></div>
										
									
										<!-- Price item -->
										<td><?php echo $class['room'] ?></td>
										<!-- Action item -->
										<td>
											<a href="../../controllers/form_update/form_update.controller.php?id=<?=$class['classroom_code']?>" class="btn btn-sm btn-success-soft btn-round me-1 mb-0"><i class="far fa-fw fa-edit"></i></a>
											<a href="controllers/classroom/delete.classroom.controller.php?id=<?php echo $class['classroom_code'] ?>" class="btn btn-sm btn-danger-soft btn-round mb-0"><i class="fas fa-fw fa-times"></i></a>
										</td>
									</tr>
									
									<?php
									endforeach;
									endif;
									?>
									
								</tbody>
								</a>
								<!-- Table body END -->
							</table>
						</div>
						<!-- Course list table END -->

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

<?php
echo '<script src="views/classroom/search.view.js"></script>';

?>