<!DOCTYPE html>
<html>
<head>
  <title>Join Class Form</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="d-flex justify-content-between mt-2 border-bottom pb-2 mb-5">
        <div class="d-flex">
            <a class="fa fa-close fa-2x text-dark ml-5" aria-hidden="true" href="/home"></a>
            <h3 class="ml-4 font-weight-normal ">Join class</h3>
        </div>
        
    
    </div>
    <div class="container w-50 p-3 mb-4 shadow-lg" style="border: 1px solid #000; border-radius: 10px; ">
        <h3>Class code</h3>
        <form action="../../controllers/join_class/join_class.controller.php" method="post">
            <div class="form-group d-flex flex-column">
                <label for="classCode" class="mb-3">Ask your teacher for the class code, then enter it here.</label>
                <input type="text" class="form-control mb-4 w-50" name="classcode" id="classCode" placeholder="Class code">
                <button type="submit" class="btn btn-primary align-self-end px-4">Join</button>
            </div>
        </form>
    </div>
    <div class="w-50 m-auto ">
        <h5>To sign in with a class code</h5>
        <ul>
            <li>Use an authorized account</li>
            <li>Use a class code with 5-7 letters or numbers, and no spaces or symbols</li>
        </ul>
        <p>You need to make sure that I have input the right class code</p>
    </div>
  <!-- Add Bootstrap JS (optional, if you need JavaScript functionality) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html