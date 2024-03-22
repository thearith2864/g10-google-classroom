<div class="col-xl-9">
    <!-- Tabs content START -->
    <div class="tab-content" id="course-pills-tabContent">
        <!-- Content START -->
        <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
            <div class="row g-4">
                <?php
                if (is_array($classes)) :
                    foreach ($classes as $class) :
                        // var_dump($class);

                ?>

                        <!-- Card item START -->

                        <div class="col-sm-5 col-lg-3 col-xl-4" id="classCard">
                            <a href="/class?id=<?= $class['classroom_code'] ?>">
                                <div class="card shadow h-100">

                                    <!-- Image -->
                                    <img src="assets/images/courses/4by3/08.jpg" class="card-img-top" alt="course image">
                                    <div class="d-flex align-items-center">
                                        <?php
                                        foreach ($teacher as $select) {
                                            if ($select['classroom_code'] == $class['classroom_code']) {
                                        ?>
                                                <img src="../../assets/images/profiles/<?= $select['image_url'] ?>" alt="" style="margin-top: -40px; height: 80px; width:80px; margin-left: 10px; " class="shadow-lg rounded-circle">
                                                <h4 style="margin-left: 10px;"><?= $select['user_name'] ?></h4>
                                        <?Php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body pb-0">
                                        <!-- Badge and favorite -->
                                        <!-- <div class="d-flex justify-content-between mb-1">
                                            <p>All level</p>
                                            <i class="far fa-heart"></i>
                                        </div> -->
                                        <!-- Title -->
                                        <h5 class="card-title fw-normal" id='className'>Class: <?php echo $class['classroom_name'] ?></h5>
                                        <p class="mb-1 text-truncate-3" style="font-size: 20px;">Subject: <?php echo $class['subject'] ?></p>
                                        <p class="mb-1 text-truncate-3" style="font-size: 20px;">Room: <?php echo $class['room'] ?></p>

                                    </div>
                                    <!-- Card footer -->
                                    <div class="card-footer pt-0 pb-3">
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <form action="../../controllers/archived_classroom_controller/unarchived_classroom_controller.php" method="post">
                                                <input type="hidden" name="classroom_code" value="<?php echo $class['classroom_code']; ?>">
                                                <button type="submit" name="unarchive" class="btn p-0 m-0"><i class="bi bi-archive-fill text-primary fa-2x"></i></button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Card item END -->
                <?php
                    endforeach;
                endif;
                ?>
            </div> <!-- Row END -->
        </div>


    </div>