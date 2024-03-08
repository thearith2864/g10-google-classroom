<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="modal fade" id="InterLink" tabindex="-1" aria-labelledby="InterLinke" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Upload Your Link work </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../controllers/student_classworks/submit_classwork.controller.php?" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="link" class="form-control" name="link" style="border: 1px solid blue;">
                        <input type="text" class="form-control" name="idAS" value="<?= $_GET['id'] ?>" hidden>
                        <input type="text" class="form-control" name="idCS" value="<?= $_GET['codeclass'] ?>" hidden>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary w-100">Make as Done</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Upload Your File work </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../controllers/student_classworks/submit_classwork.controller.php?" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="file" class="form-control" name="file" style="border: 1px solid blue;">
                        <input type="text" class="form-control" name="idAS" value="<?= $_GET['id'] ?>" hidden>
                        <input type="text" class="form-control" name="idCS" value="<?= $_GET['codeclass'] ?>" hidden>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary w-100">Make as Done</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="contianer d-flex mx-5 w-100">
    <div>
        <i class="bi bi-file-earmark-medical-fill fa-3x m-3 text-primary"></i>
    </div>
    <!-- Details about classwork -->
    <div class="w-50 px-5">
        <div class="d-flex justifycontent-between">

            <div class="p-2 w-100">
                <h5 class="card-title"><?= $chooose[0]['title'] ?></h5>
                <p class="card-text"><?= $chooose[0]['create_date'] ?></p>

            </div>
            <div class="d-flex align-items-center">
                <a href="">
                    <i class="fa fa-ellipsis-v fa-2x m-2" aria-hidden="true" style="font-size: 20px;margin: 0; padding: 0;"></i>
                </a>

            </div>
        </div>
        <div class="d-flex justifycontent-between">
            <div class=" w-100">
                <p class="card-text"><?= $chooose[0]['point'] ?> point</p>
            </div>
            <div class="d-flex align-items-end justify-content-end w-50">
                <p>Dateline: <?= $chooose[0]['dateline'] ?></p>
            </div>
        </div>
        <div>
            <p>_____________________________________________________________________________________________________________________________________________</p>
        </div>
        <div>
            <div class="p-4">
                <div class="card p-2 shadow-sm" style="width: 900px; border:1px solid black;">
                    <div class="d-flex align-items-center">
                        <div>

                            <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>"><i class="bi bi-file-earmark-ruled-fill fa-4x " style="margin-right:18px;"></i></a>

                        </div>
                        <div>
                            <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>">
                                <h4><?= $chooose[0]['file_work'] = substr($chooose[0]['file_work'], 0, 20) ?></h4>
                            </a>

                            <p><?= $pdf[0]['file_work'] = substr($pdf[0]['file_work'], -3) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

            <p style="color: gray;">____________________________________________________________________________________________________________________________________________</p>
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
                            <div class="dropdown ms-1 ms-lg-0">
                                <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical fa-1x"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                    <div class="dropdown ms-1 ms-lg-0">
                                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-pencil-square m-2 dropdown-item">Edit</i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown" style="margin: -100px 580px 0 0;   background-color: rgba(14, 13, 13, 0.075);">
                                            <form action="controllers/detait_assignment_for teacher_controller/edit_comment_controller.php" class="d-flex " method="post">
                                                <input class="form-control shadow-sm" type="text" style="height: 27px;" value="<?= $comment['comments'] ?>" name="comment">
                                                <input type="text" value="<?= $comment['comment_id'] ?>" name="idcomment" hidden>
                                                <input type="text" value="<?= $_GET['id'] ?>" name="idassignment" hidden>
                                                <input type="text" value="<?= $_GET['codeclass'] ?>" name="classcode" hidden>
                                                <input type="text" value="role" name="role" hidden>
                                                <button class="" style="height: 27px;">Send</button>
                                            </form>
                                        </ul>
                                    </div>
                                    <!-- <a class="dropdown-item" href="#"><i class="bi bi-pencil-square m-2"></i>Edit</li> -->
                                    <a class="dropdown-item" href="controllers/detait_assignment_for teacher_controller/delete_comment_controller.php?id=<?= $comment['comment_id']; ?>&idassignment=<?= $_GET['id'] ?>&code=<?= $_GET['codeclass'] ?>"><i class="bi bi-trash-fill m-2"></i>Delete</a></li>
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
                <input type="text" name="idassignment" value="<?= $_GET['id'] ?>" hidden>
                <input type="text" name="classcode" value="<?= $_GET['codeclass']; ?>" hidden>
                <button class="btn btn-primary d-flex "><i class="bi bi-send-check "></i></button>

            </form>

        </div>
    </div>
    <div>

        <!-- Form for submit the classwork  -->
        <div style="width:440px;  margin-left: 205px;">
            <div class="w-100 p-4" style=" border: solid 1px blue; border-radius: 10px;" class="shadow-lg">
                <div class="w-100 d-flex justify-content-between">
                    <p style="font-size: 26px;">Your work</p>
                    <p class="text-danger" style="font-size: 18px;">
                        <?php
                        $dateline = $chooose[0]['dateline'];
                        $currentDate = date('Y-m-d');
                        if ($dateline < $currentDate) {
                            echo "Missing";
                        }
                        ?>
                    </p>
                </div>
                <div>
                    <!-- here -->
                    <!-- student assignment  -->
                    <?php
                    if ($studentsAS == []) {
                    } else {
                        foreach ($studentsAS as $assignment) {
                            $assinment_name = $assignment;
                            if ($assignment = substr($assignment['file_work'], 0, 8) == "HOMEWORK") {

                    ?>
                                <div class="card shadow-lg border border-primary p-2" style="margin-bottom: 20px;">
                                    <!-- <h1>Assignment</h1> -->
                                    <div class="d-flex justify-content-between">
                                        <a href="../../assets/files/Assignment_for_students_subment/<?= $assinment_name['file_work'] ?>" class="d-flex align-items-center ">
                                            <i class="bi bi-file-earmark-check fa-3x " style="margin-right: 13px;"></i>
                                            <h6><?= $assinment_name['file_work'] = substr($assinment_name['file_work'], 8, 25) ?></h6>
                                        </a>
                                        <p><?= $assinment_name['date'] ?> </p>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        foreach ($studentsAS as $like) {

                            $ll = $like['file_work'];
                            if ($like['file_work'] = substr($like['file_work'], 0, 8) !== "HOMEWORK") {
                        ?>
                                <div class="card shadow-lg border border-primary p-2" style="margin-bottom: 20px;">
                                    <!-- <h1>Assignment</h1> -->
                                    <div class="d-flex justify-content-between">
                                        <a href="<?= $ll ?>" class="d-flex align-items-center ">
                                            <i class="bi bi-file-earmark-check fa-3x " style="margin-right: 13px;"></i>
                                            <i class="bi bi-filetype-txt fa-3x"></i>
                                            <?= $ll = substr($ll, 0, 26) ?>
                                        </a>
                                        <p> <?= $like['date'] ?></p>

                                    </div>

                                </div>
                    <?php
                            }
                        }
                    }
                    ?>

                    <div>
                        <div class="dropdown ms-1 ms-lg-0">
                            <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                <button class="btn " style="border:1px solid black; width:387px;">➕Add or create</button>
                            </a>
                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                <div class="" style="width: 350px;">

                                    <i class="bi bi-link fa-2x m-2" type="button" data-bs-toggle="modal" data-bs-target="#InterLink">Link</i>
                                    <br>
                                    <i class="bi bi-file-earmark-arrow-up fa-2x m-2 " type="button" data-bs-toggle="modal" data-bs-target="#createTaskModal">File</i>
                                </div>
                            </ul>
                        </div>

                    </div>
                    <!-- end student assignment? -->

                </div>
            </div>

            <div class=" mt-4 p-4" style=" border: solid 1px black; border-radius: 10px;">
                <div class="d-flex align-items-end">
                    <div>
                        <i class="bi bi-person-fill fa-2x  text-primary"></i>
                    </div>
                    <div>
                        <p style="margin-bottom: 7px; margin-left:7px;">Private comment</p>
                    </div>
                </div>
                <div>
                    <form action="" method="post">
                        <input type="text" placeholder="Add private comment..." style=" width:230px; border:solid 0.5px gray; border-radius: 10px; padding:4px;">
                        <button type="submit" style="border:none; background:none">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- ============================================================================== -->