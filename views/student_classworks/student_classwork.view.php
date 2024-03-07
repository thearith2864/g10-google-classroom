<section>
    <!-- write cover image here// -->
    <div class="container">
        <!-- Title -->
        <div class=" nav-pills-bg-soft" style="margin-bottom: 20px;">
            <i class="bi bi-images fa-2x" type="button" data-bs-toggle="modal" data-bs-target="#createTaskModal"></i>
            <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createTaskModalLabel">Create New Cover</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="controllers/page_class_each_class.cntroller/insert_cover_image_inclass.php" method="post" enctype="multipart/form-data">
                                <label for="taskTitleInput" class="form-label">Choose your cover here</label>
                                <input type="file" name="cover_image" class="form-control" id="taskTitleInput" required>
                                <input type="text" name="idclass" value="<?= $_GET['id'] ?>" hidden>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary w-100">Create</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if (!isset($checkid['cover_image'])) {
            ?>
                <div class="shadow-lg " style="margin-bottom: 10px ;">

                    <img src="assets/images/cover_class/defualt of cover image/cover_defualt.gif" class="img-fluid " alt="Responsive image">
                </div>
            <?php
            } else {
            ?>
                <div class="shadow-lg " style="margin-bottom: 10px ;">

                    <img src="../../assets/images/cover_class/<?= $checkid['cover_image'] ?>" class="img-fluid " alt="Responsive image" style="width: 100%; height:290px;">
                </div>
            <?php
            }
            ?>
            <div class=" d-flex  justify-content-sm-around  ">
                <h5 class="text-danger " style="border-bottom: 2px solid blue;">Room: <?= $checkid['room'] ?> |</h5>
                <h5 class="text-danger " style="border-bottom: 2px solid blue;">Class: <?= $checkid['classroom_name'] ?> |</h5>
                <h5 class="text-danger" style="border-bottom: 2px solid blue;">Section: <?= $checkid['section'] ?> |</h5>
                <h5 class="text-danger" style="border-bottom: 2px solid blue;">Subject: <?= $checkid['subject'] ?></h4>
                    <!-- <p class="mb-0"><?= $checkid['room'] ?></p> -->
            </div>

        </div>

        <!-- Tabs START -->
        <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3 shadow-lg" id="course-pills-tab" role="tablist">
            <!-- Tab item -->
            <li class="nav-item me-5 me-sm-5 mr-5">
                <button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">Class Stream</button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-2" type="button" role="tab" aria-controls="course-pills-tabs-2" aria-selected="false">ClassWork</button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-3" type="button" role="tab" aria-controls="course-pills-tabs-3" aria-selected="false">People </button>
            </li>
            <!-- Tab item -->
          

        </ul>
        <!-- Tabs END -->

        <!-- Tabs content START -->
        <div class="tab-content" id="course-pills-tabContent">
            <!-- Content START -->
            <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                <div class="d-flex">
                    <div>
                        <div class="card shadow-lg border border-secondary m-3" style="width: 12rem;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div>
                    <?php
                    foreach ($checkAssignments as $assignment){
                        
                    ?>
                        <div class="card  shadow-lg m-3 border border-secondary nav nav-pills nav-pills-bg-soft" style="width: 870px; height:100px; padding:0; margin:0;">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                </div>
                                <div class="p-2 w-100">
                                    <a href="/submit-form?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>">
                                            <h5 class="card-title"><?= $assignment['title'] ?></h5>
                                    </a>
                                    <p class="card-text"><?=$assignment['create_date']?></p>
                                   
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="">
                                        <i class="fa fa-ellipsis-v fa-2x m-2" aria-hidden="true" style="font-size: 20px;margin: 0; padding: 0;"></i>
                                    </a>
                                   
                                </div>
                               
                            </div>
                        </div>
                        <?php
                    }
                        ?>
                        
                    </div>
                </div>
            </div>
            <!-- Content END -->

            <!-- Content START -->
            <div class="tab-pane fade p-3 w-50 " id="course-pills-tabs-2" role="tabpanel" aria-labelledby="course-pills-tab-2"> 
                <div class="btn-group " style="margin-bottom: 20px;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    All topics
                    </button>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="#">Assignment</a></li>
                        <li><a class="dropdown-item" href="#">Quiz assignment</a></li>
                        <li><a class="dropdown-item" href="#">Question</a></li>
                        <li><a class="dropdown-item" href="#">Material</a></li>
                        <li><a class="dropdown-item" href="#">Reuse post</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Topic</a></li>
                    </ul>
                    
                </div>
                    <?php
                    foreach ($checkAssignments as $assignment):
                    ?>
                        <div class="card shadow-lg mx-2 border border-secondary nav nav-pills nav-pills-bg-soft" style="width: 800px; height: 70px;margin: 0; padding: 0;">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3" style="font-size: 23px;margin: 0; padding: 0;"></i>
                                </div>
                                <div class="w-100">
                                    <h5 class="card-title" style="margin: 0; padding: 0;"><?=$assignment['title']?></h5>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="">
                                        <i class="fa fa-ellipsis-v fa-1x " aria-hidden="true" style="font-size: 15px;margin: 0; padding: 0;"></i>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
            </div>
            <div class="tab-pane fade" id="course-pills-tabs-3" role="tabpanel" aria-labelledby="course-pills-tab-3">

                <!-- People page do here ___________________________________________________________________________________________________________________________________ -->
                <h1>People page</h1>

            </div>
            <!-- Content END -->

            <!-- Content START -->
        </div>
        <!-- Tabs content END -->
    </div>
</section