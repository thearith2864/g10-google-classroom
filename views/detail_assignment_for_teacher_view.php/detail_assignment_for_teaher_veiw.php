<section>
    <div class="container">
        <ul class="nav nav-pills    justify-content-sm-start mb-4 px-3" id="course-pills-tab" role="tablist" style="border-bottom: 2px solid blue;">
            <li class="nav-item me-5 me-sm-5 mr-5">
                <button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">Class Stream</button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-4" type="button" role="tab" aria-controls="course-pills-tabs-4" aria-selected="false">Student Work </button>
            </li>

        </ul>

        <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">

            <div class="d-flex justify-content-between p-3" style="height: 120px; border-bottom:2px solid blue; width:90%; margin-left:55px;">
                <div>
                    <h3 style="margin-left: -50px;"><i class="bi bi-file-earmark-medical fa-1x" style="margin-right: 20px;"></i><?= $chooose[0]['title'] ?></h3>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $username = $_SESSION['user'];
                    }
                    ?>
                    <p style="margin-top: -7px;"><?= $username['user_name'] ?> 🕑✅ <?= $chooose[0]['create_date'] ?> AM</p>
                    <p style="margin-top: -13px;"><?= $chooose[0]['point'] ?> Point</p>
                </div>

                <div>
                <div class="btn-group p-5">
                                    <button type="button" class=" btn" data-bs-toggle="dropdown" aria-expanded="false" style="margin: -90px -180px 0 0;">
                                        <i class="bi bi-three-dots-vertical fa-2x"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        
                                        <li><a class="dropdown-item" href="/form_edit_assignment?id=<?= $_GET['id']; ?>"><i class="bi bi-pencil-square m-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="../../controllers/assignment/delete_assignment_controller.php?id=<?= $_GET['id']; ?>"><i class="bi bi-trash-fill m-2"></i>Delete</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    </ul>
                                </div>
                    <!-- <i class="bi bi-three-dots-vertical fa-2x" style="margin-left: 110px;"></i> -->
                    
                    <p style="margin-top: -45px;">Dateline > <?= $chooose[0]['dateline'] ?> AM</p>
                </div>
            </div>
            <div class="p-4" style="height: 180px; border-bottom:2px solid blue; width:90%; margin-left:55px;">
                <div class="card p-2 shadow-sm" style="width: 90%; border:1px solid black;">
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>"><i class="bi bi-file-earmark-ruled-fill fa-4x " style="margin-right:18px;"></i></a>

                        </div>
                        <div>
                            <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>    ">
                                <h4><?= $chooose[0]['file_work'] = substr($chooose[0]['file_work'], 0, 40) ?></h4>
                            </a>

                            <p><?= $pdf[0]['file_work'] = substr($pdf[0]['file_work'], -3) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-end" style=" width:90%; margin-left:55px;">

                <i class="bi bi-people-fill fa-2x m-2"></i>
                <p><?php
                    $count = 0;
                    foreach ($displaycomment as $comment) {
                        if ($comment['file_work'] == $checkass[0]['file_work']) {
                            $count += 1;
                        }
                    }
                    echo $count;
                    ?> class comments</p>
            </div>
            <!-- ================================================================================ display comment-->
            <?php

            foreach ($displaycomment as $comment) {
                $count += 1;

                if ($comment['file_work'] == $checkass[0]['file_work']) {
            ?>
                    <div style=" width:80%; margin-left:85px;" class="d-flex align-items-center justify-content-between ">
                        <div class="d-flex align-items-center">
                            <img src="../../assets/images/profiles/<?= $comment['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-1">
                            <div class="">
                                <div class="d-flex " style="margin-bottom : -29px;">
                                    <h5 style="margin-left: 20px;"><?= $comment['user_name'] ?></h5>
                                    <p style="margin-left: 10px">✔ <?= $comment['time_comment'] ?>AM</p>
                                </div>
                                <p style="margin-top: 20px; margin-left: 20px;"><?= $comment['comments'] ?></p>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['image_url'])) {
                            $image = $_SESSION['image_url'];
                            if ($image[1] == $comment['user_name']) {

                        ?>
                                <div class="btn-group p-5">
                                    <button type="button" class=" btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fa-1x"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square m-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash-fill m-2"></i>Delete</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    </ul>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
            <?php
                }
            }
            ?>
            <!-- //------=========================================================== end display comenrnt-->
            <div style="height: 100px; width:90%; margin-left:55px;" class="p-4 d-flex">
                <?php
                if (isset($_SESSION['image_url'])) {
                    $image = $_SESSION['image_url'];
                ?>
                    <img src="../../assets/images/profiles/<?= $image[4] ?>" alt="" style="height: 40px;" class="rounded-circle m-2">
                <?php
                } else {
                ?>
                    <img src="../../assets/images/profiles/g10-google-classroom.png" alt="" style="height: 40px;" class="rounded-circle m-2">
                <?php
                }
                ?>
                <form action="controllers/detait_assignment_for teacher_controller/insert_comment_controller.php" method="post" class="d-flex">
                    <div>
                        <input name="comments" type="text" class="form-control shadow-sm" aria-describedby="emailHelp" placeholder="Enter Your comment" style="width: 800px;">
                        <span class="text-danger"><?php echo isset($_SESSION['errorcomment']) ? $_SESSION['errorcomment'] : ''; ?> </span>
                    </div>
                    <input type="text" name="idclasswork" value="<?= $chooose[0]['classwork_id'] ?>" hidden>
                    <input type="text" name="iduser" value="<?= $image['user_id'] ?>" hidden>
                    <script src="../../vendor/js/time.js" defer></script>
                    <input type="text" name="time_comment" id="hour" value="" hidden>
                    <input type="text" name="idassignment" value="<?= $_GET['id'] ?>" hidden>
                    <button class="btn btn-primary d-flex j"><i class="bi bi-send-check fa-2x"></i></button>

                </form>

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