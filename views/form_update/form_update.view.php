<!DOCTYPE html>
<html lang="en">

<head>
  <title>Class Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container mt-3">
    <form action="../../controllers/form_update/form_update_class.controller.php" method="post">
      <div class="modal-dialog shadow-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header btn-primary">
            <h4 class="modal-title">To updata class</h4>
            <a href="/trainer-classroom" class="btn ">✖</a>
          </div>

          <!-- Modal body -->
          <div class="modal-body ">
            <h2> Edit Class</h2>

          </div>
          <div class="modal-body">
            <input type="text" hidden value="<?=$get['classroom_id']?>" name="id">
            <input type="text" id="className" class="form-control" placeholder="Class name (required)" value="<?=$get['classroom_name']?> " name="classsName">
          </div>
          <div class="modal-body">
            <input type="text" id="section" class="form-control" placeholder="Section" value="<?=$get['section']?>" name="section">
          </div>
          <div class="modal-body">
            <input type="text" id="subject" class="form-control" placeholder="Subject" value="<?=$get['subject']?>" name="subject">
          </div>
          <div class="modal-body">
            <input type="text" id="room" class="form-control" placeholder="Room" value="<?=$get['room']?>" name="room">
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
          </div>
        </div>
      </div>
    </form>

  </div>

</body>

</html>