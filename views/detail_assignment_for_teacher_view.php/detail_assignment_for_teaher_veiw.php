<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<section>
    <div class="container">
        <ul class="nav nav-pills    justify-content-sm-start mb-4 mx-3" id="course-pills-tab" role="tablist" style="width:95%;border-bottom: 2px solid blue; padding-bottom:2px;">
            <!-- Tab item -->
            <li class="nav-item me-5 me-sm-5 mr-5">
                <button class="nav-link  mb-2 mb-md-0 <?php if (!isset($_GET['user_id'])) { ?>active<?php } ?> " id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">Instuctions</button>
            </li>
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0 <?php if (isset($_GET['user_id'])) { ?> active <?php } ?>" id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-4" type="button" role="tab" aria-controls="course-pills-tabs-4" aria-selected="false">Student Work </button>
            </li>

        </ul>
        <div class="tab-content " id="course-pills-tabContent" style="margin-left:80px;">
            <div class="tab-pane fade show <?php if (!isset($_GET['user_id'])) { ?>active<?php } ?>" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">

                <div class="d-flex justify-content-between p-3" style="height: 120px; border-bottom:1.5px solid blue; width:87.5%; margin-left:55px;">
                    <div>
                        <h3 class="text-primary" style="margin-left: -50px;"><i class="bi bi-file-earmark-medical fa-1x text-primary" style="margin-right: 20px;"></i><?= $chooose[0]['title'] ?></h3>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $username = $_SESSION['user'];
                        }
                        ?>
                        <p style="margin-top: -7px;"><?= $username['user_name'] ?> 🕑✅ <?= $chooose[0]['create_date'] ?> </p>
                        <p style="margin-top: -13px;"><?= $chooose[0]['point'] ?> Point</p>
                    </div>

                    <div>
                        <div class="btn-group p-5">
                            <button type="button" class=" btn" data-bs-toggle="dropdown" aria-expanded="false" style="margin: -90px -180px 0 0;">
                                <i class="bi bi-three-dots-vertical fa-2x text-primary pb-5" ></i>
                            </button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/form_edit_assignment?id=<?= $_GET['id']; ?>&codeclass=<?= $_GET['codeclass'] ?>"><i class="bi bi-pencil-square m-2"></i>Edit</a></li>
                                <li><a class="dropdown-item" href="../../controllers/assignment/delete_assignment_controller.php?id=<?= $_GET['id']; ?>&codeclass=<?= $_GET['codeclass'] ?>"><i class="bi bi-trash-fill m-2"></i>Delete</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </div>
                        <!-- <i class="bi bi-three-dots-vertical fa-2x" style="margin-left: 110px;"></i> -->
                        <script src="../../vendor/js/time.js" defer></script>
                        <span id="date" class="text-danger"></span>
                        <p id="dateline" style="margin-top: -45px;"><?= $chooose[0]['dateline'] ?></p>
                    </div>
                </div>
                <div class="p-4" style="height: 180px; border-bottom:1.5px solid blue; width:87%; margin-left:55px;">
                    <div class="card p-2 shadow-sm" style="width: 99%; border:0.5px solid black;">
                        <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>    ">
                            <div class="d-flex align-items-center">
                                <div>
                                    <i class="bi bi-file-earmark-ruled-fill fa-4x " style="margin-right:18px;"></i>

                                </div>
                                <div>
                                    <h4><?= $chooose[0]['file_work'] = substr($chooose[0]['file_work'], 0, 40) ?></h4>

                                    <p><?= $pdf[0]['file_work'] = substr($pdf[0]['file_work'], -3) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-end" style=" width:90%; margin-left:55px;">

                    <i class="bi bi-people-fill fa-2x m-2 text-primary"></i>
                    <p><?php
                        $count = 0;
                        foreach ($displaycomment as $comment) {
                            if ($comment['file_work'] == $checkass[0]['file_work']) {
                                if ($comment['comment_user'] == null) {

                                    $count += 1;
                                }
                            }
                        }
                        echo $count;
                        ?> class comments</p>
                </div>
                <!-- ================================================================================ display comment-->
                <?php

                foreach ($displaycomment as $comment) {if ($comment['file_work'] == $checkass[0]['file_work']) {
                    if ($comment['comment_user'] == null) {
                        echo $comment['comment_user'];
                        $count += 1;
            ?>
                        <div style=" width:87%; margin-left:85px;" class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex align-items-center">
                                <img src="../../assets/images/profiles/<?= $comment['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-1">
                                <div class="">
                                    <div class="d-flex " style="margin-bottom : -29px;">
                                        <h5 style="margin-left: 20px;"><?= $comment['user_name'] ?></h5>
                                        <p style="margin-left: 10px">✔️ <?= $comment['time_comment'] ?>AM</p>
                                    </div>
                                    <p style="margin-top: 20px; margin-left: 20px;"><?= $comment['comments'] ?></p>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION['image_url'])) {
                                $image = $_SESSION['user'];
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
                }
                ?>
                <!-- //------=========================================================== end display comenrnt-->
                <div style="height: 100px; width:90%; margin-left:55px;" class="p-4 d-flex">
                    <?php
                    $image = $_SESSION['image_url'];
                    if (is_array($image)) {
                    ?>


                        <img src="../../assets/images/profiles/<?= $_SESSION['image_url']['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-2">
                    <?php
                    } else {
                    ?>

                        <!-- <img class="avatar-img rounded-circle shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url'] ?>" alt="Card image cap"> -->
                        <img src="../../assets/images/profiles/<?= $_SESSION['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-2">
                    <?php
                    }
                    if ($image == null) {
                    ?>
                        <img src="assets/images/profiles/g10-google-classroom.png" alt="" style="height: 40px;" class="rounded-circle m-2">


                    <?php
                    }
                    ?>
                    <form action="controllers/detait_assignment_for teacher_controller/insert_comment_controller.php" method="post" class="d-flex">
                        <div>
                            <input name="comments" type="text" class="form-control shadow-sm width rounded-pill" aria-describedby="emailHelp" placeholder="Enter Your comment" style="width: 770px; height: 40px; margin-top:10px">
                            <span class="text-danger"><?php echo isset($_SESSION['errorcomment']) ? $_SESSION['errorcomment'] : ''; ?> </span>
                        </div>
                        <input type="text" name="idclasswork" value="<?= $chooose[0]['classwork_id'] ?>" hidden>
                        <?php
                        $user_id = $_SESSION['user'];

                        ?>
                        <input type="text" name="iduser" value="<?= $user_id['user_id'] ?>" hidden>
                        <input type="text" name="idassignment" value="<?= $_GET['id'] ?>" hidden>
                        <input type="text" name="classcode" value="<?= $_GET['codeclass']; ?>" hidden>
                        <button class="btn" style="margin-left: -20px;"><span class="material-symbols-outlined ms-2 mt-1 " style="font-size: 35px; color: blue; ">send</span> </button>

                    </form>

                </div>
            </div>
            <div class="tab-pane fade show <?php if (isset($_GET['user_id'])) { ?> active <?php } ?> " id="course-pills-tabs-4" role="tabpanel" aria-labelledby="course-pills-tab-4">
                <div class="d-flex">
                    <div class="w-50 ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Name Student Terned in</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">score</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($chose as $student) {
                                    $count = 0;
                                    foreach ($studentfinished as $students) {
                                        if ($student['user_id'] == $students['user_id']) {
                                            $count += 1;
                                            if ($count <= 1) {
                                                if(isset($_GET['user_id'])){
                                                if ($student['user_id'] == $_GET['user_id']){
                                ?>
                                                <tr  style="background-color: rgba(0, 255, 255, 0.275);" class="bg-danger-soft-hover">
                                                    <td colspan="2"  >
                                                        <a href="/detait_assignment?id=<?= $_GET['id'] ?>&codeclass=<?= $_GET['codeclass'] ?>&user_id=<?= $students['user_id'] ?>">
                                                            <div class="d-flex align-items-start justify-content-between">
                                                                <div class="d-flex align-items-center"><img src="../../assets/images/profiles/<?= $student['image_url'] ?>" alt="image_student" style="height: 38px; margin-right:10px;" class="rounded-circle ">
                                                                    <h5><?= $student['user_name'] ?></h5>
                                                                       <p><?= $count ?></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td><?= $students['date'] ?></td>
                                                    <td style="width: 100px;">
                                                    <?php
                                                    if (isset($_GET['user_id'])){
                                                    ?>
                                                        <form action="controllers/detait_assignment_for teacher_controller/insert_score_student.php" method="post">
                                                            <input type="text" style="width: 50px;" name="score" placeholder="score">
                                                            <input type="text" value="<?= $_GET['id'] ?>" name="ass_id" hidden>
                                                            <input type="text" value="<?=$student['user_email'] ?>" name="email_student" hidden>
                                                            <input type="text" value="<?= $_GET['codeclass'] ?>" name="code" hidden>
                                                            <input type="text" value="<?= $students['user_id'] ?>" name="user_id" hidden>
                                                            <input type="text" value="<?= $students['submit_id']?>" name="submit_id" hidden>

                                                            <!-- <input type="text" value="<?= $student['user_email'] ?>" name="email_student" hidden> -->

                                                            <button hidden>send</button>
                                                        </form>
                                                        <p class="text-primary"><?= $students['score'] ?>/<?= $chooose[0]['point'] ?> point</p>
                                                        </td>
                                                </tr>
                                <?php
                                                   } }else{
                                                    ?>
                                                         <tr>
                                                    <td colspan="2" class="bg-danger-soft-hover">
                                                        <a href="/detait_assignment?id=<?= $_GET['id'] ?>&codeclass=<?= $_GET['codeclass'] ?>&user_id=<?= $students['user_id'] ?>">
                                                            <div class="d-flex align-items-start justify-content-between">
                                                                <div class="d-flex align-items-center"><img src="../../assets/images/profiles/<?= $student['image_url'] ?>" alt="image_student" style="height: 38px; margin-right:10px;" class="rounded-circle ">
                                                                    <h5><?= $student['user_name'] ?></h5>
                                                                    <p><?= $count ?></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td><?= $students['date'] ?></td>

                                                    <td style="width: 100px;">
                                                    <?php
                                                    if (isset($_GET['user_id'])){
                                                    ?>
                                                        <form action="controllers/detait_assignment_for teacher_controller/insert_score_student.php" method="post">
                                                            <input type="text" style="width: 50px;" name="score" placeholder="score">
                                                            <input type="text" value="<?= $students['submit_id']?>" name="submit_id" hidden>
                                                            <input type="text" value="<?= $_GET['id'] ?>" name="ass_id" hidden>
                                                            <input type="text" value="<?= $_GET['codeclass'] ?>" name="code" hidden>
                                                            <input type="text" value="<?= $students['user_id'] ?>" name="user_id" hidden>
                                                            <input type="text" value="<?= $student['user_email'] ?>" name="email_student" hidden>

                                                            <button hidden>send</button>
                                                        </form>
                                                        <?php
                                                    }
                                                        ?>
                                                        <p class="text-primary"><?= $students['score'] ?>/<?= $chooose[0]['point'] ?> point</p>

                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }else{
                                                ?>
                                                         <tr>
                                                    <td colspan="2"  class="bg-primary-soft-hover">
                                                        <a href="/detait_assignment?id=<?= $_GET['id'] ?>&codeclass=<?= $_GET['codeclass'] ?>&user_id=<?= $students['user_id'] ?>">
                                                            <div class="d-flex align-items-start justify-content-between">
                                                                <div class="d-flex align-items-center"><img src="../../assets/images/profiles/<?= $student['image_url'] ?>" alt="image_student" style="height: 38px; margin-right:10px;" class="rounded-circle ">
                                                                    <h5><?= $student['user_name'] ?></h5>
                                                                    <p><?= $count ?></p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td><?= $students['date'] ?></td>
                                                    <td style="width: 100px;">
                                                    <?php
                                                    if (isset($_GET['user_id'])){
                                                    ?>
                                                        <form action="controllers/detait_assignment_for teacher_controller/insert_score_student.php" method="post">
                                                            <input type="text" style="width: 50px;" name="score" placeholder="score">
                                                            <input type="text" value="<?= $students['submit_id'] ?>" name="submit_id" hidden>
                                                            <input type="text" value="<?= $_GET['id'] ?>" name="ass_id" hidden>
                                                            <input type="text" value="<?= $_GET['codeclass'] ?>" name="code" hidden>
                                                            <input type="text" value="<?= $students['user_id'] ?>" name="user_id" hidden>
                                                            <input type="text" value="<?= $student['user_email'] ?>" name="email_student" hidden>
                                                            <button hidden>send</button>
                                                        </form>
                                                        <?php
                                                    }
                                                        ?>
                                                        <p class="text-primary"><?= $students['score'] ?>/<?= $chooose[0]['point'] ?> point</p>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Name Student Assigned</th>
                                    <!-- <th scope="col"><?= $chooose[0]['point'] ?> point</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($chose as $student) {?>


                                    <tr  >
                                        <td colspan="2" class="bg-primary-soft-hover">
                                            <div class="d-flex align-items-start justify-content-between">
                                                
                                                <div class="d-flex align-items-center"><img src="../../assets/images/profiles/<?= $student['image_url'] ?>" alt="image_student" style="height: 38px; margin-right:10px;" class="rounded-circle ">
                                                    <h5><?= $student['user_name'] ?></h5>
                                                </div>
                                            
                                            </div>
                                        </td>

                                        <!-- <td style="width: 70px;"> <?= $chooose[0]['point'] ?> point</td> -->

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="w-50  d-flex align-items-start">
                        <div class="container">
                            <?php
                            if (!isset($studentWork)) {
                            ?>
                                <h4>Eelect any Student to Show Student's Work Document here👇</h4>
                            <?php
                            }
                            ?>
                            <div class="">
                                <?php
                                if (isset($studentWork)) {
                                    if ($studentWork[0]['score'] < 50) {
                                ?>
                                        <h4 class="d-flex text-danger">You have given <?= $studentWork[0]['score'] ?> points</h4>
                                    <?php
                                    } else {
                                    ?>
                                        <h4 class="d-flex text-primary">You have given <?= $studentWork[0]['score'] ?> points</h4>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            if (isset($studentWork)) {
                            ?>
                                <div class="overflow-scroll" style="height: 170px;">
                                    <?php
                                    foreach ($studentWork as $work) {
                                        $storeLike = $work['file_work'];
                                        if ($work['file_work'] = substr($work['file_work'], 0, 8) !== "HOMEWORK") {

                                    ?>
                                            <a href="<?= $storeLike ?>">
                                                <div class="card border m-2 ">
                                                    <div class="d-flex align-items-center ">

                                                        <i class="bi bi-file-earmark-font fa-3x" style="margin-right: 10px;"></i>
                                                        <p><?= $storeLike = substr($storeLike, 0, 40) ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    if (isset($studentWork)) {
                                        foreach ($studentWork as $work) {
                                            $storeLike = $work['file_work'];
                                            if ($work['file_work'] = substr($work['file_work'], 0, 8) == "HOMEWORK") {?>
                                                <a href="../../assets/files/Assignment_for_students_subment/<?= $storeLike ?>">
                                                    <div class="card border m-2">
                                                        <div class=" d-flex align-items-center"> 

                                                            <i class="bi bi-file-earmark fa-3x " style="margin-right: 10px;"></i>
                                                            <h5><?= $storeLike ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- comment private-------------------------------------------------------------------------------------------- -->

                                <div>
                                    <div class=" overflow-scroll " style="height: 300px; margin-top:10px;">
                                        <?php
                                        foreach ($displaycomment as $comment) {
                                            if ($comment['file_work'] == $checkass[0]['file_work']) {
                                                if ($comment['comment_user'] == $_GET['user_id']) {

                                                    if (isset($_SESSION['image_url'])) {
                                                        $image = $_SESSION['user'];
                                                        if ($image[1] == $comment['user_name']) {
                                        ?>
                                                            <div class="d-flex align-items-center justify-content-between ">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="../../assets/images/profiles/<?= $comment['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-1">
                                                                    <div class="">
                                                                        <div class="d-flex " style="margin-bottom : -29px;">
                                                                            <h5 style="margin-left: 20px;"><?= $comment['user_name'] ?></h5>
                                                                            <p style="margin-left: 10px">✔️ <?= $comment['time_comment'] ?>AM</p>
                                                                        </div>
                                                                        <p style="margin-top: 20px; margin-left: 20px;"><?= $comment['comments'] ?></p>
                                                                    </div>
                                                                </div><div class="dropdown ms-1 ms-lg-0 ">
                                                                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="bi bi-three-dots-vertical fa-1x"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                                                                        <div class="dropdown ms-1 ms-lg-0">
                                                                            <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="bi bi-pencil-square m-2 dropdown-item">Edit</i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown" style="background-color: rgba(14, 13, 13, 0.075); margin:-100px 210px;  ">
                                                                                <form action="controllers/detait_assignment_for teacher_controller/edit_comment_controller.php" class="d-flex " method="post">
                                                                                    <input class="form-control shadow-sm" type="text" style="height: 27px;" value="<?= $comment['comments'] ?>" name="comment">
                                                                                    <input type="text" value="<?= $comment['comment_id'] ?>" name="idcomment" hidden>
                                                                                    <input type="text" value="<?= $_GET['id'] ?>" name="idassignment" hidden>
                                                                                    <input type="text" value="<?= $_GET['codeclass'] ?>" name="classcode" hidden>
                                                                                    <input type="text" name="comment_user" value="<?= $_GET['user_id'] ?>" hidden>
                                                                                    <!-- <input type="text" name="role  " value="<?= $_GET['user_id'] ?>" hidden> -->
                                                                                    <button class="" style="height: 27px;" hidden>Send</button>
                                                                                </form>
                                                                            </ul>
                                                                        </div>
                                                                        <!-- <a class="dropdown-item" href="#"><i class="bi bi-pencil-square m-2"></i>Edit</li> -->
                                                <a class="dropdown-item" href="controllers/detait_assignment_for teacher_controller/delete_comment_controller.php?id=<?= $comment['comment_id']; ?>&idassignment=<?= $_GET['id'] ?>&code=<?= $_GET['codeclass'] ?>&user=<?=$_GET['user_id']?> "><i class="bi bi-trash-fill m-2"></i>Delete</a></li>                          
                                                                    </ul>
                                                                </div>
                                                        <?php
                                                        }
                                                    }
                                                        ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        if ($comment['comment_user'] == $_SESSION['user'][0]) {
                                                            if ($comment['user_id'] == $_GET['user_id']) {
                                                            ?>
                                                                <div>
                                                                    <div class="d-flex align-items-center justify-content-between ">
                                                                        <div class="d-flex align-items-center">
                                                                            <img src="../../assets/images/profiles/<?= $comment['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-1">
                                                                            <div class="">
                                                                                <div class="d-flex " style="margin-bottom : -29px;">
                                                                                    <h5 style="margin-left: 20px;"><?= $comment['user_name'] ?></h5>
                                                                                    <p style="margin-left: 10px">✔️ <?= $comment['time_comment'] ?></p>
                                                                                </div>
                                                                                <p style="margin-top: 20px; margin-left: 20px;"><?= $comment['comments'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                    </div>
                                    <!-- end commet private  --------------------------------------------------------------------------------------------->
                                    <div class="d-flex">
                                        <form action="controllers/detait_assignment_for teacher_controller/insert_comment_controller.php" method="post" class="w-100 d-flex align-items-center ">
                                            <?php
                                            $image = $_SESSION['image_url'];
                                            if (is_array($image)) {
                                            ?>
                                                <img src="../../assets/images/profiles/<?= $_SESSION['image_url']['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-2">
                                            <?php
                                            } else {
                                            ?>
                                                <!-- <img class="avatar-img rounded-circle shadow" src="assets/images/profiles/<?php echo $_SESSION['image_url'] ?>" alt="Card image cap"> -->
                                                <img src="../../assets/images/profiles/<?= $_SESSION['image_url'] ?>" alt="" style="height: 40px;" class="rounded-circle m-2">
                                            <?php
                                            }
                                            if ($image == null) {
                                            ?>
                                                <img src="assets/images/profiles/g10-google-classroom.png" alt="" style="height: 40px;" class="rounded-circle m-2">
                                            <?php
                                            }
                                            ?>
                                            <div class="w-100">
                                                <input name="comments" type="text" class="form-control shadow-sm width rounded-pill" aria-describedby="emailHelp" placeholder="Enter Your comment" style="height: 40px; ">

                                            </div>
                                            <input type="text" name="idclasswork" value="<?= $chooose[0]['classwork_id'] ?>" hidden>
                                            <?php
                                            $user_id = $_SESSION['user'];
                                            ?>
                                            <input type="text" name="iduser" value="<?= $user_id['user_id'] ?>" hidden>
                                            <input type="text" name="idassignment" value="<?= $_GET['id'] ?>" hidden>
                                            <input type="text" name="classcode" value="<?= $_GET['codeclass']; ?>" hidden>
                                            <input type="text" name="comment_user" value="<?= $_GET['user_id'] ?>" hidden>
                                            <button class="btn" style="margin-left: -25px;"><span class="material-symbols-outlined m-2 " style="font-size: 50px; ">send</span> </button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
                            }
        ?>

        </div>

    </div>
    <!-- Content END -->
    <!-- Content START -->
    </div>
    <!-- Tabs content END -->
    </div>
</section