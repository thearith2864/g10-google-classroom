<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
<section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php

    if (isset ($_GET['invitefalse'])) {
        ?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Cann't Invite",
                text: "You can not invite you into your class!",
                footer: 'You can invite anothor People .'
            });
        </script>
        <?php
    }
    if (isset ($_GET['invitetrue'])) {
        ?>
        <script>
            let timerInterval;
            Swal.fire({
                icon: "success",
                title: "invite successfuly",
                html: "I will close in <b></b> milliseconds.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        </script>

        <?php
    }
    ?>
    <!-- =============================================== -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="add_topic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new topic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controllers/assignment/inser_topic_controller.php" method="post">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Add topic here</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3">
                                    <i class="bi bi-node-plus-fill"></i>
                                </span>
                                <input type="text" class="form-control border-0 bg-light rounded-end ps-1"
                                    placeholder="Inter your topic" id="exampleInputtopic" name="topic">
                                <input type="text" name="code" value="<?= $_GET['id'] ?>" hidden>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">cancel</button>
                    <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================================================== -->

    <div class="modal fade" id="form_invite_student" tabindex="-1" aria-labelledby="createTaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTaskModalLabel">Form invite student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controllers/page_class_each_class.cntroller/invite_student.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email Student</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com" name="email_student">
                            <input type="text" name="code" value="<?= $_GET['id'] ?> " hidden>
                            <input type="text" name="teacher_email" value="<?= $_SESSION['user']['user_email'] ?> "
                                hidden>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger align-self-end px-4">Invite </button>
                </form>
                <!-- <button type="button" class="btn btn-primary">Join Class</button> -->
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    <!-- write cover image here// -->
    <div class="container">
        <!-- Title -->
        <div class=" nav-pills-bg-soft" style="margin-bottom: 20px;">
            <i class="bi bi-images fa-2x" type="button" data-bs-toggle="modal" data-bs-target="#createTaskModal"></i>
            <div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createTaskModalLabel">Create New Cover</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="controllers/page_class_each_class.cntroller/insert_cover_image_inclass.php"
                                method="post" enctype="multipart/form-data">
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
            if (!isset ($checkid['cover_image'])) {
                ?>
                <div class="shadow-lg " style="margin-bottom: 10px ;">

                    <img src="assets/images/cover_class/defualt of cover image/cover_defualt.gif" class="img-fluid "
                        alt="Responsive image">
                </div>
                <?php
            } else {
                ?>
                <div class="shadow-lg " style="margin-bottom: 10px ;">

                    <img src="../../assets/images/cover_class/<?= $checkid['cover_image'] ?>" class="img-fluid "
                        alt="Responsive image" style="width: 100%; height:290px;">
                </div>
                <?php
            }
            ?>
            <div class=" d-flex  justify-content-sm-around  ">
                <h5 class="text-primary " style="border-bottom: 2px solid black;">Room:
                    <?= $checkid['room'] ?> |
                </h5>
                <h5 class="text-primary " style="border-bottom: 2px solid black;">Class:
                    <?= $checkid['classroom_name'] ?> |
                </h5>
                <h5 class="text-primary" style="border-bottom: 2px solid black;">Section:
                    <?= $checkid['section'] ?> |
                </h5>
                <h5 class="text-primary" style="border-bottom: 2px solid black;">Subject:
                    <?= $checkid['subject'] ?> |
                    </h4>
                    <!-- <p class="mb-0"><?= $checkid['room'] ?></p> -->
            </div>

        </div>


        <!-- Tabs START -->
        <ul class="nav nav-pills  justify-content-sm-center mb-4 px-3 " id="course-pills-tab" role="tablist"
            style="border-bottom: 2px solid blue; padding-bottom: 3px;">
            <!-- Tab item -->
            <li class="nav-item me-5 me-sm-5 mr-5">
                <button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill"
                    data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1"
                    aria-selected="false">Class Stream</button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill"
                    data-bs-target="#course-pills-tabs-2" type="button" role="tab" aria-controls="course-pills-tabs-2"
                    aria-selected="false">ClassWork</button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0 " id="course-pills-tab-3" data-bs-toggle="pill"
                    data-bs-target="#course-pills-tabs-3" type="button" role="tab" aria-controls="course-pills-tabs-3"
                    aria-selected="false">People </button>
            </li>
            <!-- Tab item -->
            <!-- <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-4" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-4" type="button" role="tab" aria-controls="course-pills-tabs-4" aria-selected="false">Grades</button>
            </li> -->

        </ul>
        <!-- Tabs END -->

        <!-- Tabs content START -->
        <div class="tab-content" id="course-pills-tabContent">
            <!-- Content START -->
            <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel"
                aria-labelledby="course-pills-tab-1">
                <div class="d-flex">
                    <div>
                        <div class="card shadow-lg border border-secondary m-3 bg-primary-soft-hover"
                            style="width: 12rem;">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">

                                    <div class="d-flex">
                                        <img src="../../assets/images/event/logo_meet_2020q4_color_2x_web_96dp.png"
                                            alt="logo_google_meet" style="height: 30px; margin-right: 10px;">
                                        <h5>Meet</h5>
                                    </div>
                                    <div class="dropdown ms-1 ms-lg-0">
                                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                                            data-bs-auto-close="outside" data-bs-display="static"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <button class="dropdown-item rounded-circle"><i
                                                    class="bi bi-three-dots-vertical"></i></button>
                                        </a>
                                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                                            aria-labelledby="profileDropdown">
                                            <script src="../../vendor/js/time.js" defer></script>
                                            <input type="text" id="text-to-copy"
                                                value="https://meet.google.com/gfe-aqct-pbk?authuser=0" readonly>
                                            <button class="btn dropdown-item" onclick="copyText()">Copy link</button>
                                            <button class="btn dropdown-item">Manage</button>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="https://meet.google.com/gfe-aqct-pbk?authuser=0" class="btn btn-primary "
                                    style="width: 150px;">Join</a>
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
                                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                                            data-bs-auto-close="outside" data-bs-display="static"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical" style="margin-left: 24px;"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                                            aria-labelledby="profileDropdown">
                                            <script src="../../vendor/js/time.js" defer></script>
                                            <input type="text" id="text-to-copy"
                                                value="https://meet.google.com/gfe-aqct-pbk?authuser=0" readonly hidden>
                                            <button class="btn dropdown-item" onclick="copyText()">Copy link</button>
                                            <button class="btn dropdown-item">Manage</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                <h3>
                                    <?= $_GET['id'] ?>
                                </h3>
                                <button class="dropdown-item rounded-circle"><i class="bi bi-fullscreen"></i></button>
                            </div>

                        </div>
                    </div>
                    <div>
                        <?php
                        $targetitme = '';
                        if (empty ($targetitme)) {
                            $targetitme = date('Y-m-d ');
                        }
                        foreach ($checkAssignments as $assignment) {
                            ?>
                            <div class="card  shadow-lg m-3 border border-secondary bg-primary-soft-hover"
                                style="width: 205%;">
                                <div class="card-body d-flex">
                                    <div>
                                        <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"
                                            style="width: 90%; ">
                                            <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                        </a>
                                    </div>
                                    <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"
                                        style="width: 90%; ">
                                        <div class="p-1 w-100 ">
                                            <h5 class="card-title mb-0 " style="font-size:19px;">
                                                <?= $assignment['title'] ?>
                                            </h5>
                                            <p class="card-text m-0" style='font-size:13px'>
                                                <?= $assignment['create_date'] ?>
                                            </p>
                                            <?php
                                            if ($assignment['dateline'] > $targetitme) {
                                                ?>

                                                <p class="card-text" id="dateline" style='font-size:13px'> Dateline
                                                    (
                                                    <?= $assignment['dateline'] ?>)
                                                </p>
                                                <?php

                                            } else {
                                                ?>

                                                <h5 class="text-danger card-text " style='font-size:16px'>Missing</h5>
                                                <?php

                                            }
                                            ?>

                                        </div>
                                    </a>
                                    <div class="d-flex align-items-center">

                                        <a
                                            href="../../controllers/assignment/delete_assignment_controller.php?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"><i
                                                class="bi bi-trash-fill fa-2x m-2"></i></a>


                                        <a
                                            href="/form_edit_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"><i
                                                class="bi bi-pencil-square fa-2x m-2"></i></a>

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
            <div class="tab-pane fade p-3" id="course-pills-tabs-2" role="tabpanel"
                aria-labelledby="course-pills-tab-2">
                <div class="btn-group " style="margin-bottom: 20px;">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ➕ Create
                    </button>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Assignment"><i
                                    class="bi bi-file-earmark-medical m-2 fa-2x"></i>Assignment</a></li>
                        <li><a class="dropdown-item"
                                href="/assignment?id=<?php echo $_GET['id'] ?>&type=Quiz assignment"><i
                                    class="bi bi-file-earmark-medical-fill m-2 fa-2x"></i>Quiz assignment</a></li>
                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Question"><i
                                    class="bi bi-question-square m-2 fa-2x"></i>Question</a></li>
                        <li><a class="dropdown-item" href="/assignment?id=<?php echo $_GET['id'] ?>&type=Material"><i
                                    class="bi bi-journal-bookmark-fill m-2 fa-2x"></i>Material</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-clockwise m-2 fa-2x"></i>Reuse
                                post</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" data-toggle="modal" data-target="#add_topic">Topic</a>
                        </li>
                    </ul>

                </div>
                <?php
                foreach ($checkAssignments as $assignment) {
                    ?>
                    <?php
                    if ($assignment['dateline'] > $targetitme) {
                        ?>
                        <div class="card  shadow-lg m-3 border border-secondary bg-danger-soft-hover" style="width: 100%;">
                            <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>"
                                style="width: 90%;">
                                <div class="card-body d-flex">
                                    <div>

                                        <i class="bi bi-file-earmark-medical-fill fa-3x m-3"></i>
                                    </div>

                                    <div class=" w-100">
                                        <h4 class="card-title text-primary" style='font-size:19px; margin-bottom:5px;'>
                                            <?= $assignment['title'] ?>
                                        </h4>

                                        <p class="card-text" style='font-size:13px; margin-bottom:2px;'>
                                            <?= $assignment['create_date'] ?>
                                        </p>
                                        <p class="card-text" style='font-size:13px;'>
                                            <?= $assignment['dateline'] ?>
                                        </p>

                                    </div>
                                    <!-- <div class="d-flex align-items-center">
                                <a href="">
                                    <i class="bi bi-trash-fill fa-2x m-2"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-pencil-square fa-2x m-2"></i>
                                </a>
                            </div> -->
                                </div>
                            </a>
                        </div>

                        <?php
                    } else {
                        ?>
                        <div class="card  shadow-lg m-3 border border-danger bg-danger-soft-hover " style="width: 100%;">
                            <a href="/detait_assignment?id=<?= $assignment['classwork_id'] ?>&codeclass=<?= $_GET['id'] ?>">
                                <div class="card-body d-flex">
                                    <div>
                                        <i class="bi bi-file-earmark-medical-fill fa-3x m-3 text-primary"></i>
                                    </div>
                                    <div class="w-100">
                                        <h5 class="card-title text-danger" style='font-size:19px,'>
                                            <?= $assignment['title'] ?>
                                        </h5>
                                        <p class="card-text" style='font-size:13px;margin-bottom:2px;'>
                                            <?= $assignment['create_date'] ?>
                                        </p>
                                        <h5 class="text-danger card-text" style='font-size:16px;'>❌ Missing</h5>
                                    </div>
                                    <!-- <div class="d-flex align-items-center">
                                        <a href="">
                                            <i class="bi bi-trash-fill fa-2x m-2"></i>
                                        </a>
                                        <a href="">
                                            <i class="bi bi-pencil-square fa-2x m-2"></i>
                                        </a>
                                    </div> -->
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                foreach ($alltopic as $topic) {
                    if ($topic['classroom_id'] == $id[0]['classroom_id']) {
                        ?>
                        <div class="card bg-danger-soft-hover m-3" style="width: 100%;">

                            <div class=" card-body">
                                <div class="d-flex justify-content-sm-between ">
                                    <h3>
                                        <?= $topic['title'] ?>
                                    </h3>
                                    <div class="dropdown ms-1 ms-lg-0">
                                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                                            data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3 p-2">
                                            
                                            <!-- <button data-toggle="modal" data-target="#rename_topic"
                                                class="bg-primary-soft-hover p-2 btn w-100">Rename</button> -->
                                            <button data-toggle="model" data-target="#rename_topic"  class="bg-primary-soft-hover p-2 btn w-100"><a  href="../../controllers/assignment/delete_topic.controller.php?id=<?= $topic['topic_id'] ?>"
                                                  >Delete</a></button>
                                            

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="m-3 card-footer">
                                Students will see this topic once work is added to it
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="tab-pane fade" id="course-pills-tabs-3" role="tabpanel" aria-labelledby="course-pills-tab-3">

                <!-- People page do here ___________________________________________________________________________________________________________________________________ -->
                <div class="d-flex justify-content-between p-2 m-3 text-primary align-items-end"
                    style="height: 70px; border-bottom: 1px solid blue;">
                    <h3 class="text-primary">Teacher</h3>

                    <i class="bi bi-person-plus-fill fa-2x"></i>
                </div>
                <div class="p-2 m-3">
                    <div class="d-flex align-items-center">
                        <img src="../../assets/images/profiles/<?= $teacher[0]['image_url'] ?>" alt=""
                            style="height: 40px;" class="rounded-circle m-3">
                        <h5>
                            <?= $teacher[0]['user_name'] ?>
                        </h5>

                    </div>
                </div>
                <div class="d-flex justify-content-between p-2 m-3 text-primary align-items-end"
                    style="height: 70px; border-bottom: 1px solid blue;">
                    <h3 class="text-primary">students</h3>
                    <?php
                    $count = 0;
                    foreach ($chose as $member) {
                        $count += 1;
                    }
                    ?>
                    <div class="d-flex">
                        <p style="margin-top: 19px;" class="m-2">
                            <?= $count . " Student " ?>
                        </p>
                        <i class="bi bi-person-plus-fill fa-2x" data-bs-toggle="modal"
                            data-bs-target="#form_invite_student"></i>
                    </div>
                </div>

                <div class="p-3 m-2">
                    <?php
                    foreach ($chose as $member) {
                        ?>
                        <div class="d-flex justify-content-between p-4 m-2 dropdown-item"
                            style="height: 80px; border-bottom: 1px solid black; ">
                            <div class="d-flex align-items-center">
                                <img src="../../assets/images/profiles/<?= $member['image_url'] ?>" alt="not foun profile"
                                    style="height: 40px;" class="rounded-circle m-3">
                                <h5>
                                    <?= $member['user_name'] ?>
                                </h5>
                                <!-- <h5><?= $member['user_id'] ?></h5> -->
                            </div>
                            <div class="right">
                                <div class="dropdown ms-1 ms-lg-0">
                                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                                        data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <button class="dropdown-item rounded-circle"><i
                                                class="bi bi-three-dots-vertical"></i></button>
                                    </a>
                                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                                        aria-labelledby="profileDropdown">
                                        <!-- option here -->
                                        <li><a class="dropdown-item"
                                                href="controllers/page_class_each_class.cntroller/delete_steudent.php?id=<?= $member['classroommember_id']; ?>&class=<?= $_GET['id'] ?>">Remove</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="https://mail.google.com/mail/u/0/?fs=1&to=<?= $member['user_email'] ?>&tf=cm">Email
                                                <?= $member['user_email'] ?>
                                            </a></li>
                                        <!-- <li><a class="dropdown-item" href="#">mute</a></li> -->

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="tab-pane fade" id="course-pills-tabs-4" role="tabpanel" aria-labelledby="course-pills-tab-4">

               
                <h1>Grade page</h1>

            </div> -->
            <!-- Content END -->

            <!-- Content START -->
        </div>
        <!-- Tabs content END -->
    </div>
</section