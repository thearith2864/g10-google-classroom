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
          <div class="modal-dialog shadow-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header btn-primary">
                <h4 class="modal-title">To updata class</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body ">
                <h2> Edit Class</h2>
              </div>
              <div class="modal-body">
                <input type="text" id="className" class="form-control" placeholder="Class name (required)">
              </div>
              <div class="modal-body">
                <input type="text" id="section" class="form-control" placeholder="Section">
              </div>
              <div class="modal-body">
                <input type="text" id="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="modal-body">
                <input type="text" id="room" class="form-control" placeholder="Room">
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
              </div>
            </div>
          </div>

  </div>

</body>

</html>