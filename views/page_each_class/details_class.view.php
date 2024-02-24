<section>
    <div class="container">
        <!-- Title -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fs-1"><?=$checkid['classroom_name']?></h2>
                <p class="mb-0"><?=$checkid['room']?></p>
            </div>
        </div>

        <!-- Tabs START -->
        <ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
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
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-4" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-4" type="button" role="tab" aria-controls="course-pills-tabs-4" aria-selected="false">Grades</button>
            </li>

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
                        <div class="card  shadow-lg m-3 border border-secondary nav nav-pills nav-pills-bg-soft" style="width: 1020px;">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                </div>
                                <div class="p-2 w-100">
                                    <h5 class="card-title"><?=$assignment['title']?></h5>
                                    <p class="card-text"><?=$assignment['create_date']?></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="">
                                        <a href="/class"><i class="bi bi-trash-fill fa-2x m-2"></i></a>
                                    </a>
                                    <a href="">
                                        <i class="bi bi-pencil-square fa-2x m-2"></i>
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
            <div class="tab-pane fade p-3" id="course-pills-tabs-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
                <div class="btn-group " style="margin-bottom: 20px;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        ➕ Create
                    </button>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="/assignment"><i class="bi bi-file-earmark-medical m-2 fa-2x"></i>Assignment</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-medical-fill m-2 fa-2x"></i>Quiz assignment</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-question-square m-2 fa-2x"></i>Question</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-journal-bookmark-fill m-2 fa-2x"></i>Material</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-clockwise m-2 fa-2x"></i>Reuse post</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Topic</a></li>
                    </ul>
                    
                </div>
                <?php
                    foreach ($checkAssignments as $assignment){
                    ?>
                        <div class="card  shadow-lg m-3 border border-secondary nav nav-pills nav-pills-bg-soft" style="width: 1230px;">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                </div>
                                <div class="p-2 w-100">
                                    <h5 class="card-title"><?=$assignment['title']?></h5>
                                    <p class="card-text"><?=$assignment['create_date']?></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="">
                                        <i class="bi bi-trash-fill fa-2x m-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="bi bi-pencil-square fa-2x m-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                        ?>
            </div>
            <div class="tab-pane fade" id="course-pills-tabs-3" role="tabpanel" aria-labelledby="course-pills-tab-3">

                <!-- People page do here ___________________________________________________________________________________________________________________________________ -->
                <h1>People page</h1>

            </div>
            <div class="tab-pane fade" id="course-pills-tabs-4" role="tabpanel" aria-labelledby="course-pills-tab-4">

                <!-- Grade page do here ___________________________________________________________________________________________________________________ -->
                <h1>Grade page</h1>

            </div>
            <!-- Content END -->

            <!-- Content START -->
        </div>
        <!-- Tabs content END -->
    </div>
</section