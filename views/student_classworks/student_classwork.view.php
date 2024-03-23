
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
                <h5 class="text-primary " style="border-bottom: 2px solid black;">Room: <?= $checkid['room'] ?> |</h5>
                <h5 class="text-primary " style="border-bottom: 2px solid black;">Class: <?= $checkid['classroom_name'] ?> |</h5>
                <h5 class="text-primary" style="border-bottom: 2px solid black;">Section: <?= $checkid['section'] ?> |</h5>
                <h5 class="text-primary" style="border-bottom: 2px solid black;">Subject: <?= $checkid['subject'] ?></h4>
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
            <!-- <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-3" type="button" role="tab" aria-controls="course-pills-tabs-3" aria-selected="false">People </button>
            </li> -->
            <!-- Tab item -->
          

        </ul>
        <!-- Tabs END -->

        <!-- Tabs content START -->
        <div class="tab-content" id="course-pills-tabContent">
            <!-- Content START -->
            <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                <div class="d-flex">
                    <div>
                        <a href="/todos">
                        <div class="card shadow-lg border border-secondary mt-3 me-4" style="width: 16rem;">
                            <div class="card-body">
                                <h5>Upcoming</h5>
                            </div>
                            <div class="card-main ps-3">
                                <p>Woohoo, no work due soon!</p>
                            </div>
                            <div class="card-footer d-flex justify-content-end p-3">
                                <p>View All</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div>
                    <?php
                    foreach ($checkAssignments as $assignment){
                        
                    ?>
<<<<<<< HEAD
                        
                        <a href="/submit-form?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>" class="card shadow-lg m-3 border border-primary nav nav-pills nav-pills-bg-soft"  style="width: 807px; height:100px; padding:0; margin:0; background:white;">
=======
                        <div class="card  shadow-lg m-3 border border-secondary nav nav-pills nav-pills-bg-soft" style="width: 315%; height:100px; padding:0; margin:0;">
>>>>>>> fix_bug_style
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3 color-primary text-primary"></i>
                                </div>
                                <div class="p-2 w-100">
                                    <h5 class="card-title"><?= $assignment['title'] ?></h5>
                                    <p class="card-text" style='font-size:small'><?= $assignment['create_date'] ?></p>
                                </div>
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </a>
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
                    // print_r($checkAssignments);
                    foreach ($checkAssignments as $assignment):
                    ?>
                    <a href="/submit-form?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>">
                        <div class="card shadow-lg mx-2 border border-secondary nav nav-pills nav-pills-bg-soft m-2" style=" width: 205%; ">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3" style="font-size: 23px;margin: 0; padding: 0;"></i>
                                </div>
                                <div class="w-100">
                                    <h5 class="card-title" style="margin: 0; padding: 0;"><?=$assignment['title']?></h5>
                                    <p><?=$assignment['dateline']?></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    
                                </div>
                                
                            </div>
                        </div>
                    </a>
                    <?php
                    endforeach;
                    ?>
            </div>
        
            <!-- Content END -->

            <!-- Content START -->
        </div>
        <!-- Tabs content END -->
    </div>
</section