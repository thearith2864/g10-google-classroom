<!DOCTYPE html>
<html lang="en">
<head>
	<title>create class</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="E-Classroom">

	
	<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">

</head>

<body >

<!-- **************** MAIN CONTENT START **************** -->
<main >
	<section class="w-50 mt-5 rounded-4 m-auto p-0 d-flex bg-primary  align-items-center position-relative overflow-hidden">


				<!-- Right -->
				<div class="col-12 col-lg-0 m-auto">
					<div class="row my-3">
						<div class="col-sm-0 col-xl-11 m-auto">
							<!-- Title -->
							
							<h1 class="fs-4 text-white">Create class</h1>

								<!-- Form START -->
								<form id="createClassForm" action="../../controllers/create_class/create_class.controller.php" method="post">
									<!-- User name -->
									<div class="mb-4">
										
										<div class="input-group input-group-lg">
											
											<input type="input" class="form-control  border-0 bg-light rounded-end ps-2" name="className" placeholder="Class name (required)" >
										</div>
									</div>
									<!-- Classname  -->
									<div class="mb-4">
										<div class="input-group input-group-lg">
										
											<input type="input" class="form-control border-0 bg-light rounded-end ps-2" name='section' placeholder="Section" id="exampleInputEmail1">
										</div>
									</div>
									<!-- Password -->
									<div class="mb-4">
										
										<div class="input-group input-group-lg">
											
											<input type="input" class="form-control border-0 bg-light rounded-end ps-2" name="subject" placeholder="Subject" id="inputPassword5">
										</div>
										
									</div>
									<div class="mb-4">
										
										<div class="input-group input-group-lg">
											
											<input type="input" class="form-control border-0 bg-light rounded-end ps-2" name="room" placeholder="room" id="inputPassword5">
										</div>
										
									</div>
									<!-- Button -->
									<div class="d-flex justify-content-end">
										<div class="d-flex">
											<a href="/trainer-classroom" class="text-white w-50 me-3 link-danger">Cancel</a>
											<button type='submit' class="text-white bg-primary border-0 w-50">Create</button>
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


</body>
</html>