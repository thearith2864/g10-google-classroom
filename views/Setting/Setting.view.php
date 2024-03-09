
<!DOCTYPE html>
<html lang="en">

<head>
  <title>edit profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <form action="controllers/Setting/update_setting.controller.php" method="post">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header btn-primary d-flex justify-content-center">
          <h1 class="modal-title text-white">EDIT PROFILE</h1>
          
        </div>

        <!-- Modal body -->
        <div class="modal-body ">
          <h2> Edit profile</h2>
          <a href="/home" class="btn d-flex justify-content-end ">✖</a>

        </div>
        <div class="modal-body">
          <h6>Update profile picture</h6>
          <input type="text" hidden name="id">
          <input type="file" id="fileName" class="form-control" name="fileName">
          
        </div>


        <div class="modal-body">
          <h6>Edit Name</h6>
          <input type="text" id="name" class="form-control" placeholder="Edit Your Name"  name="name">
        </div>

        <div class="modal-body">
          <h6>Edit Password</h6>
          <input type="password" id="password" class="form-control" placeholder="Edit Your Password"  name="password">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
        </div>
      </div>
    </form>

  </div>

</body>