<!DOCTYPE html>
<html lang="en">

<head>
    <title>todos pages of students</title>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="E-Classroom">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

        <div class="border" style="height: 80px;">
            <ul class="nav nav-pills mb-4 px-3 mt-4" id="course-pills-tab" role="tablist">
                <!-- Tab item -->
                <li class="nav-item me-5 me-sm-5 mr-5">
                    <button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill"
                        data-bs-target="#course-pills-tabs-1" type="button" role="tab"
                        aria-controls="course-pills-tabs-1" aria-selected="false">Assigned</button>
                </li>
                <!-- Tab item -->
                <li class="nav-item me-1 me-sm-5 ml-5">
                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill"
                        data-bs-target="#course-pills-tabs-2" type="button" role="tab"
                        aria-controls="course-pills-tabs-2" aria-selected="false">Missing</button>
                </li>
                <!-- Tab item -->
                <li class="nav-item me-1 me-sm-5 ml-5">
                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill"
                        data-bs-target="#course-pills-tabs-3" type="button" role="tab"
                        aria-controls="course-pills-tabs-3" aria-selected="false">Done</button>
                </li>
            </ul>
        </div>
        <!-- Tab content 1  assigned -->  
        <div class="tab-content" id="course-pills-tabContent">
            <div class="tab-pane fade show active border-1" id="course-pills-tabs-1" role="tabpanel"
                aria-labelledby="course-pills-tab-1">
                <div class="tab-pane" id="course-pills-tabs-1">
                    <div>  
                    <form action="/todos" method="post">
                        <div class="col-md-4 m-5 d-flex">
                            <select id="inputState" class="form-control" name="select">
                                <option selected value="All class">All class</option>
                                <?php 
                                foreach($displayclass as $classs){
                                    ?>
                                <option value="<?=$classs['classroom_id']?>"><?=$classs['classroom_name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button class="btn btn-primary"> sent</button>
                        </div>
                    </form>
                          
                        <!--start card======================================================================== -->
                        <?php 
                        foreach ($selectAll as $clas) {
                            
                        ?>
                        <div class="card m-5 m-2 fa-1x shadow-lg p-2 mb-4 bg-white rounded">
                            <div class="card-body">
                                <i class="bi bi-file-earmark-medical m-2 fa-2x"></i><?php echo $clas[3]; ?>
                                <p class="m-2">dateline > <?php echo $clas['create_date']; ?></p>
                                <p class="m-2">point > <?php echo $clas['point']; ?></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- end card ==================================================================== -->
                        
                    </div>
                </div>
            </div>
             <!-- missing ==================================================================== -->
             
        </div>
    
</body>

</html>