<section>
    
        <!-- write cover image here// -->

        
        <!-- Tabs START -->
        <ul class="nav nav-pills  justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist" style="border-bottom: 3px solid blue;">
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
                            <div class="card-header">
                                <div class="d-flex justify-content-between">

                                    <div class="d-flex">
                                        <img src="../../assets/images/event/logo_meet_2020q4_color_2x_web_96dp.png" alt="logo_google_meet" style="height: 30px; margin-right: 10px;">
                                        <h5>Meet</h5>
                                    </div>
                                    <div class="dropdown ms-1 ms-lg-0">
                                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                            <button class="dropdown-item rounded-circle"><i class="bi bi-three-dots-vertical"></i></button>
                                        </a>
                                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                            <script src="../../vendor/js/time.js" defer></script>
                                            <input type="text" id="text-to-copy" value="https://meet.google.com/gfe-aqct-pbk?authuser=0" readonly>
                                            <button class="btn dropdown-item" onclick="copyText()">Copy link</button>
                                            <button class="btn dropdown-item">Manage</button>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="https://meet.google.com/gfe-aqct-pbk?authuser=0" class="btn btn-primary " style="width: 150px;">Join</a>
                                <i class="bi bi-eye">Visible to students</i>
                            </div>
                        </div>
                        <div class="card shadow-lg border border-secondary m-3" style="width: 12rem;">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">

                                    <div class="d-flex">
                                        <h5>Class code</h5>
                                    </div>
                                    <div class="dropdown ms-1 ms-lg-0">
                                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical" style="margin-left: 24px;"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                            <script src="../../vendor/js/time.js" defer></script>
                                            <input type="text" id="text-to-copy" value="https://meet.google.com/gfe-aqct-pbk?authuser=0" readonly hidden>
                                            <button class="btn dropdown-item" onclick="copyText()">Copy link</button>
                                            <button class="btn dropdown-item">Manage</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                <h3><?= $_GET['id'] ?></h3>
                                <button class="dropdown-item rounded-circle"><i class="bi bi-fullscreen"></i></button>
                            </div>

                        </div>
                    </div>
                    <div>
                        <?php
                        $targetitme = '';
                        if (empty($targetitme)) {
                            $targetitme = date('Y-m-d ');
                        }
                        foreach ($checkAssignments as $assignment) {
                        ?>
                            <div class="card  shadow-lg m-3 border border-secondary" style="width: 190%;">
                                <div class="card-body d-flex">
                                    <div>
                                        <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                    </div>
                                    <div class="p-2 w-100 ">
                                        <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>">
                                            <h5 class="card-title"><?= $assignment['title'] ?></h5>
                                        </a>
                                        <p class="card-text"><?= $assignment['create_date'] ?></p>
                                        <?php
                                        if ($assignment['dateline'] > $targetitme) {
                                        ?>

                                            <p class="card-text"> <?= $assignment['dateline'] ?></p>
                                        <?php

                                        } else {
                                        ?>

                                            <h5 class="text-danger card-text ">Missing</h5>
                                        <?php

                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="">
                                            <a href="../../controllers/assignment/delete_assignment_controller.php?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"><i class="bi bi-trash-fill fa-2x m-2"></i></a>
                                        </a>
                                        <a href="">
                                            <a href="/form_edit_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"><i class="bi bi-pencil-square fa-2x m-2"></i></a>
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

                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Assignment"><i class="bi bi-file-earmark-medical m-2 fa-2x"></i>Assignment</a></li>
                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Quiz assignment"><i class="bi bi-file-earmark-medical-fill m-2 fa-2x"></i>Quiz assignment</a></li>
                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Question"><i class="bi bi-question-square m-2 fa-2x"></i>Question</a></li>
                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Material"><i class="bi bi-journal-bookmark-fill m-2 fa-2x"></i>Material</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-clockwise m-2 fa-2x"></i>Reuse post</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Topic</a></li>
                    </ul>

                </div>
                <?php
                foreach ($checkAssignments as $assignment) {
                ?>
                    <?php
                    if ($assignment['dateline'] > $targetitme) {
                    ?>
                        <div class="card  shadow-lg m-3 border border-secondary " style="width: 1050px;">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                </div>
                                <div class="p-2 w-100">
                                    <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>">
                                        <h4 class="card-title text-primary"><?= $assignment['title'] ?></h4>
                                    </a>
                                    <p class="card-text"><?= $assignment['create_date'] ?></p>
                                    <p class="card-text"> <?= $assignment['dateline'] ?></p>

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
                    } else {
                    ?>
                        <div class="card  shadow-lg m-3 border border-danger  " style="width: 1050px; ">
                            <div class="card-body d-flex">
                                <div>
                                    <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                </div>
                                <div class="p-2 w-100">
                                    <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>">
                                        <h4 class="card-title text-danger"><?= $assignment['title'] ?></h4>
                                    </a>
                                    <p class="card-text"><?= $assignment['create_date'] ?></p>
                                    <h5 class="text-danger card-text ">❌ Missing</h5>
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
                }
                ?>
            </div>
            <div class="tab-pane fade" id="course-pills-tabs-3" role="tabpanel" aria-labelledby="course-pills-tab-3">

                <!-- People page do here ___________________________________________________________________________________________________________________________________ -->
                <div class="d-flex justify-content-between p-2 m-3 text-primary align-items-end" style="height: 70px; border-bottom: 1px solid blue;">
                    <h3 class="text-primary">Teacher</h3>

                    <i class="bi bi-person-plus-fill fa-2x"></i>
                </div>
                <div class="p-2 m-3">
                    <div class="d-flex align-items-center">
                        <img src="../../assets/images/profiles/<?= $teacher[0]['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-3">
                        <h5><?= $teacher[0]['user_name'] ?></h5>

                    </div>
                </div>
                <div class="d-flex justify-content-between p-2 m-3 text-primary align-items-end" style="height: 70px; border-bottom: 1px solid blue;">
                    <h3 class="text-primary">students</h3>
                    <?php
                    $count = 0;
                    foreach ($chose as $member) {
                        $count += 1;
                    }
                    ?>
                    <div class="d-flex">
                        <p style="margin-top: 19px;" class="m-2"><?= $count . " Student " ?></p>
                        <i class="bi bi-person-plus-fill fa-2x"></i>
                    </div>
                </div>

                <div class="p-3 m-2">
                    <?php
                    foreach ($chose as $member) {
                    ?>
                        <div class="d-flex justify-content-between p-4 m-2 dropdown-item" style="height: 80px; border-bottom: 1px solid black;">
                            <div class="d-flex align-items-center">
                                <img src="../../assets/images/profiles/<?= $member['image_url'] ?>" alt="not foun profile" style="height: 40px;" class="rounded-circle m-3">
                                <h5><?= $member['user_name'] ?></h5>
                            </div>
                            <div class="right">
                                <div class="dropdown ms-1 ms-lg-0">
                                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                        <button class="dropdown-item rounded-circle"><i class="bi bi-three-dots-vertical"></i></button>
                                    </a>
                                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                        <!-- option here -->
                                        <li><a class="dropdown-item" href="controllers/page_class_each_class.cntroller/delete_steudent.php?id=<?= $member['classroommember_id']; ?>&class=<?= $_GET['id'] ?>">Remove</a></li>
                                        <li><a class="dropdown-item" href="#">Email name</a></li>
                                        <li><a class="dropdown-item" href="#">mute</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
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