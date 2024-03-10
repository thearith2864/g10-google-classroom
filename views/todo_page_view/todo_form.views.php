<section>
    <div class="container">
        <!-- Tabs START -->
        <ul class="nav nav-pills mb-4 px-3 p-2" id="course-pills-tab" role="tablist" style="border-bottom: 3px solid blue;">
            <!-- Tab item -->

            <li class="nav-item me-5 me-sm-5 mr-5">
                <button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">
                    <h5>Assigned</h5>
                </button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-2" type="button" role="tab" aria-controls="course-pills-tabs-2" aria-selected="false">
                    <h5 class="text-danger">Missing</h5>
                </button>
            </li>
            <!-- Tab item -->
            <li class="nav-item me-1 me-sm-5 ml-5">
                <button class="nav-link mb-2 mb-md-0 " id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-3" type="button" role="tab" aria-controls="course-pills-tabs-3" aria-selected="false">
                    <h5>Done</h5>
                </button>
            </li>
            <!-- Tab item -->

        </ul>
        <!-- Tabs END -->

        <!-- Tabs content START -->
        <div class="tab-content" id="course-pills-tabContent">
            <!-- Content START -->
            <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                <div>
                    <div>
                        <?php
                        foreach ($showclass as $assignment) {
                            foreach ($showAS as $ss) {
                                if ($ss['dateline'] > date('Y-m-d')) {

                                    if ($ss['classroom_id'] == $assignment['classroom_id']) {
                        ?>
                                        <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                            <div class="card m-3 shadow-lg" style="border: 1px solid gray;">
                                                <div class="card-header" style="border-bottom: 1px solid gray;">
                                                    <h6>Class :<?= $assignment['classroom_name'] ?></h6>
                                                    <!-- <h6><?= $assignment['room'] ?></h6> -->

                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <i class="bi bi-file-earmark-ruled-fill fa-3x " style="margin-right: 20px;"></i>
                                                        <div>
                                                            <h4><?= $ss['title'] ?></h4>
                                                            <h6><?= $ss['dateline'] ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                        <?php
                                    }
                                }
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>
            <!-- Content END -->

            <!-- Content START -->
            <div class="tab-pane fade p-3" id="course-pills-tabs-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
                <?php

                foreach ($showclass as $assignment) {
                    foreach ($showAS as $ss) {
                    if ($ss['dateline'] < date('Y-m-d')) {
                        if ($ss['classroom_id'] == $assignment['classroom_id']) {

                ?>
                            <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                <div class="card m-3 shadow-lg" style="border: 1px solid gray; border: 1px solid red;">
                                    <div class="card-header" style="border-bottom: 1px solid gray;">
                                        <h6>Class; <?= $assignment['classroom_name'] ?></h6>

                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <i class="bi bi-file-earmark-ruled-fill fa-3x " style="margin-right: 20px;"></i>
                                            <div>
                                                <h4><?= $ss['title'] ?></h4>
                                                <h6 class="text-danger"><?= $ss['dateline'] ?> - Missing ❗ </h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                <?php
                        }
                    }
                }}

                ?>

            </div>
            <div class="tab-pane fade" id="course-pills-tabs-3" role="tabpanel" aria-labelledby="course-pills-tab-3">

                <?php
                foreach ($showclass as $assignment) {
                    foreach ($showAS as $ss) {

                        if ($ss['classroom_id'] == $assignment['classroom_id']) {

                            foreach ($workdone as $done) {

                                if ($done['classwork_id'] == $ss['classwork_id']) {

                ?>
                                    <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                        <div class="card m-3 shadow-lg" style="border: 1px solid blue;">
                                            <div class="card-header" style="border-bottom: 1px solid gray;">
                                                <h6>Class :<?= $assignment['classroom_name'] ?></h6>
                                                <!-- <h6><?= $assignment['room'] ?></h6> -->

                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <i class="bi bi-file-earmark-ruled-fill fa-3x " style="margin-right: 20px;"></i>
                                                    <div>
                                                        <h4><?= $ss['title'] ?></h4>
                                                        <h6 class="text-primary"><?= $ss['dateline'] ?> Done ✔ 🙌</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                <?php
                                }
                            }
                        }
                    }
                }


                ?>
            </div>

            <!-- Content END -->

            <!-- Content START -->
        </div>
        <!-- Tabs content END -->
    
    </div>
</section>