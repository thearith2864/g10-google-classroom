<!DOCTYPE html>
<html lang="en">

<head>
    <title>assignment</title>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">
    
    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="conainer ">
        <form action="../../controllers/assignment/edit_assignment_controller.php"  method="post" enctype="multipart/form-data">
            <nav class="navbar navbar-expand-xl shadow-lg border border-secondary pmd-navbar pmd-z-depth p-2">
                <!-- <script src="../../vendor/js/time.js"defer></script> -->
                <div class="container-fluid ">
                <!-- <h1 id="hour" >jjj</h1> -->
                <i class="bi bi-calendar2-x-fill "> Assignments </i>
                
                    <div class="btn-group">
                        <button class="btn btn-primary w-100">Create</button>
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"></a>Assign</li>
                            <li><a class="dropdown-item" href="#"></a>Schedule</li>
                            <li><a class="dropdown-item" href="#"></a>Save draft</li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"></a>Discard draft</li>

                           
                            </li>

                        </ul>
                    </div>
                    </button>
            </div>
        </nav>
        <div class="d-flex">
            <div class="col-8">
                <div class="card m-3 shadow-lg border border-secondary">
                    <div class="card-body">
                        <div class="form-group pmd-textfield m-3">
                            <label for="input-without-floating">Titles</label>
                            <input type="text" id="input-without-floating" class="form-control" name="id_classwork" value="<?=$each_assignment['classwork_id']?>" hidden>
                            <input type="text" id="input-without-floating" class="form-control" name="title" value="<?=$each_assignment['title']?>">
                            <!-- <input type="text" id="hour" class="form-control" name="title"> -->
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-outline m-3">
                            <label>Instruction (optional)</label>
                            <input required class="form-control" style="padding-bottom: 90px;" name="instruction" value="<?=$each_assignment['instruction']?>" >
</ipun>

                        </div>
                    </div>
                </div>
                <div class="card m-3 shadow-lg border border-secondary">
                    <div class="card-header">
                        Attach
                    </div>
                    <div class="p-3 d-flex justify-content-center">
                        <div class="drive m-3 p-3">
                            <a href="#"><i class="fab fa-google-drive fa-2x m-1" style=" color: rgb(0, 128, 55);"></i></a>
                            <h6>Drive</h6>
                        </div>
                        <div class="you_tube m-3 p-3 ">
                            <a href="a"><i class="fab fa-youtube fa-2x m-1" style="color: #ed302f;"></i></a>
                            <h6>You Tube</h6>
                        </div>
                        <div class="create m-3 ">
                            <div class="btn-group">
                                <button type="button" class=" btn dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-folder-plus fa-2x m-1 p-2" style=" color: rgb(0, 128, 55); "></i>
                                </button>
                                <ul class="dropdown-menu  flex-row">
                                    <li><a class="dropdown-item" href="#"> <span class="material-symbols-outlined color-red">wysiwyg</span>Docs</a></li>
                                    <li><a class="dropdown-item" href="#"><span class="material-symbols-outlined">credit_card</span>Slide</a></li>
                                    <li><a class="dropdown-item" href="#"><span class="material-symbols-outlined">bottom_sheets</span>Sheets</a></li>
                                    <li><a class="dropdown-item" href="#"><span class="material-symbols-outlined">view_kanban</span>Drawings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><span class="material-symbols-outlined">shelf_position</span>Form</a></li>
                                </ul>

                            </div>
                            <h6 class="text " style="width:20"> Create</h6>
                        </div>
                        <div class="Upload m-3">
                            
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span id="boot-icon" class="bi bi-upload fa-2x" style=" color: rgb(0, 128, 55);"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <input type="file" class="upload " name="files">
                            </div>
                            <h6>Upload</h6>
                        </div>
                        <div class="link m-3">
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-link fa-2x" style="color: rgb(0, 128, 55);"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="card" style="width: 14.5rem;">
                                        <div class="card-body ">
                                            <h5 class="card-title">Add link</h5>
                                            <button class="btn d-flex flex-row">
                                                <button type="button" class="btn btn-light p-2">Cencel</button>
                                                <button type="button" class="btn btn-light p-2">Add link</button>
                                            </button>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <!-- <a href="#"><i class="bi bi-link fa-2x" style="color: rgb(0, 128, 55);"></i></a> -->
                            <h6>Link</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card shadow-lg border border-secondary h-100 ">
                    <div class="card-header d-flex ">
                        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label col-md-4 m-2">
                            <label for="country-select" >For</label>
                            <select id="country-select" class="form-control" name="class">
                                <?php
                                foreach ($allclass as $class){
                                    ?>
                                    <option><?=$class['classroom_name']?></option>
                                    <?php
                                }
                                ?>                               
                            </select>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label  m-2">
                            <label for="country-select">All students</label>
                            <select id="country-select" class="form-control">
                                <option></option>
                                <option>India</option>
                                <option>United States of America</option>
                                <option>United Kingdom</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group pmd-input-group input-group-lg m-4">
                        <div class="pmd-textfield ">Point
                            <input type="number" class="form-control" aria-label="Large" aria-describedby="large-ig" name="point" value="<?=$each_assignment['point']?>">
                        </div>
                    </div>
                    <div class="input-group pmd-input-group input-group-lg m-3">
                        <div class="md-form md-outline input-with-post-icon datepicker m-2 ">Date
                            <input placeholder="Select date" type="date" id="example" class="form-control " name="date" value="<?=$each_assignment['dateline']?>">
                              <script src="../../vendor/js/time.js"defer></script>
                                <!-- <h1 id="our" ></h1> -->
                                <input type="text" name="date_of_create" id="hour" hidden>
                                <input type="text" name="codeclass" id="hour" hidden value="<?=$codeclass?>">
                            <!-- <input type="date" id="hour"  name="date"> -->
                        </div>
                    </div>
                    <div class="input-group pmd-input-group input-group-lg m-4">
                        <div class="pmd-textfield ">Topics
                            <select id="country-select" class="form-control" name="topic">
                                <?php
                                foreach ($alltopic as $topic){
                                ?>
                                <option><?=$topic['topic_name']?></option>
                                <?php
                                }
                                ?>
                        </div>
                    </div>

                </div>

            </div>
            <div class="footer"></div>
        </div>
</form>
        <!-- **************** MAIN CONTENT END **************** -->

        <!-- Back to top -->
        <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i>
        </div>

        <!-- Bootstrap JS -->
        <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Template Functions -->
        <script src="vendor/js/functions.js"></script>
</body>