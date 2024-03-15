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
          <h1 class="modal-title text-white"> ACCOUNT SETTINGS</h1>

        </div>

        <!-- Modal body -->
        <div class="modal-body ">
          <h2> Edit account settings</h2>
        </div>

        <div class="modal-body" hidden>
          <h5>Change Name</h5>
          <input type="text" id="name" class="form-control" placeholder="Enter New Name" name="name" value="<?=$_SESSION['user'][1]?>">
        </div>
        
        <div class="modal-body" hidden>
          <h5>Enter Your Email</h5>
          <input type="email" id="email" class="form-control" placeholder="Enter Your email" name="email" value="<?=$_SESSION['email']?>">
        </div>
        
      <!-- password_update_form.php -->
        <div class="modal-body">
          <h5>Change Password</h5>
          <label for="current_password">Current Password:</label>
          <input type="password" class="form-control" name="current_password" id="current_password" required>

          <label for="new_password">New Password:</label>
          <input type="password" class="form-control" name="new_password" id="new_password" required>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <a class="btn btn-danger" href="/home">Cancel</a>
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
        </div>
      </div>
    </form>

  </div>

</body>
