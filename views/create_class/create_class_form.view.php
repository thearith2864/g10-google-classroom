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

<div class="container mt-3">
          <div class="modal-dialog shadow-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header btn-primary">
                <h4 class="modal-title">Create class</h4>
                <a href="/trainer-classroom" class="text-dark mx-2 link-danger">X</a>
              </div>

              <!-- Modal body -->
			  <form id="createClassForm" action="../../controllers/create_class/create_class.controller.php" method="post">
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
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" data-dismiss="modal">Create</button>
				</div>
			  </form>
            </div>
          </div>

  </div>

</body>
</html>