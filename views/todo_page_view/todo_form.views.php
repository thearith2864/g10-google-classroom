<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>





<div class="col-xl-9">
    <!-- Card START -->
    <div class="card border rounded-3">
        <!-- Card header START -->

        <div class="border-bottom d-flex" style="padding-top: 20px;">
            <!-- Tabs START -->
            <ul class="nav nav-pills mb-4 px-3 " id="course-pills-tab" role="tablist">
                <!-- Tab item -->

                <li class="nav-item me-5 me-sm-5 mr-5">
                    <button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">
                        Assigned
                    </button>
                </li>
                <!-- Tab item -->
                <li class="nav-item me-1 me-sm-5 ml-5">
                    <button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-2" type="button" role="tab" aria-controls="course-pills-tabs-2" aria-selected="false">
                        Missing
                    </button>
                </li>
                <!-- Tab item -->
                <li class="nav-item me-1 me-sm-5 ml-5">
                    <button class="nav-link mb-2 mb-md-0 " id="course-pills-tab-3" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-3" type="button" role="tab" aria-controls="course-pills-tabs-3" aria-selected="false">
                        Done
                    </button>
                </li>
                <!-- Tab item -->

            </ul>
            <!-- Tabs END -->
        </div>
        <div  >

            <!-- Tabs content START -->
            <div class="tab-content" id="course-pills-tabContent">
                <!-- Content START -->
                <div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
                    <div>
                        <div>
                            <?php
                            foreach ($showclass as $assignment) {
                                foreach ($showAS as $ss) {
                                    if ($ss['dateline'] >= date('Y-m-d')) {

                                        if ($ss['classroom_id'] == $assignment['classroom_id']) {

                            ?>
                                            <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                                <div class="card m-3 shadow-lg" style="border: 1px solid gray;">
                                                    <div class="p-2" style="border-bottom: 1px solid gray;">
                                                        <h6>Class :<?= $assignment['classroom_name'] ?></h6>
                                                        <!-- <h6><?= $assignment['room'] ?></h6> -->

                                                    </div>
                                                    <div class="p-2 ">
                                                        <div class="d-flex">
                                                            <i class="bi bi-file-earmark-ruled-fill fa-2x " style="margin-right: 20px;"></i>
                                                            <div>
                                                                <h5><?= $ss['title'] ?></h5>
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
                <div class="tab-pane fade " id="course-pills-tabs-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
                    <?php

                    foreach ($showclass as $assignment) {
                        foreach ($showAS as $ss) {
                            if ($ss['dateline'] < date('Y-m-d')) {
                                if ($ss['classroom_id'] == $assignment['classroom_id']) {
                                    if ($workdone == []) {
                    ?>
                                        <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                            <div class="card m-3 shadow-lg" style="border: 1px solid gray; border: 1px solid red;">
                                                <div class="p-2" style="border-bottom: 1px solid gray;">
                                                    <h6>Class; <?= $assignment['classroom_name'] ?></h6>

                                                </div>
                                                <div class="p-2">
                                                    <div class="d-flex">
                                                        <i class="bi bi-file-earmark-ruled-fill fa-2x " style="margin-right: 20px;"></i>
                                                        <div>
                                                            <h5><?= $ss['title'] ?></h5>
                                                            <h6 class="text-danger"><?= $ss['dateline'] ?> - Missing ❗ </h6>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                    } else {
                                        $countmissing = 0;
                                        
                                        foreach ($workdone as $done) {
                                            if ($done['classwork_id'] !== $ss['classwork_id']) {
                                            
                                                $countmissing += 1;
                                                if ($countmissing <= 1){
                                                  
                                                // ---------------------
                                        ?>
                                                <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                                    <div class="card m-3 shadow-lg" style="border: 1px solid gray; border: 1px solid red;">
                                                        <div class="p-2" style="border-bottom: 1px solid gray;">
                                                            <h6>Class; <?= $assignment['classroom_name'] ?></h6>

                                                        </div>
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <i class="bi bi-file-earmark-ruled-fill fa-2x " style="margin-right: 20px;"></i>
                                                                <div>
                                                                    <h5><?= $ss['title'] ?></h5>
                                                                    <h6 class="text-danger"><?= $ss['dateline'] ?> - Missing ❗ </h6>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                    <?php
                                            }}
                                        }
                                    }
                                }
                            }
                        }
                    }


                    ?>

                </div>
                <div class="tab-pane fade" id="course-pills-tabs-3" role="tabpanel" aria-labelledby="course-pills-tab-3">

                    <?php
                    foreach ($showclass as $assignment) {
                        foreach ($showAS as $ss) {

                            if ($ss['classroom_id'] == $assignment['classroom_id']) {
                                $count = 0;
                                foreach ($workdone as $done) {

                                    if ($done['classwork_id'] == $ss['classwork_id']) {
                                        $count += 1;
                                        if ($count <= 1) {

                    ?>
                                            <a href="/submit-form?id=<?= $ss['classwork_id'] ?>&codeclass=<?= $assignment['classroom_code'] ?>">

                                                <div class="card m-3 shadow-lg" style="border: 1px solid blue;">
                                                    <div class="p-2" style="border-bottom: 1px solid gray;">
                                                        <h6>Class :<?= $assignment['classroom_name'] ?></h6>
                                                        <!-- <h6><?= $assignment['room'] ?></h6> -->

                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex">
                                                            <i class="bi bi-file-earmark-ruled-fill fa-2x " style="margin-right: 20px;"></i>
                                                            <div>
                                                                <h5><?= $ss['title'] ?></h5>
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
                    }


                    ?>
                </div>

                <!-- Content END -->

                <!-- Content START -->
            </div>
            <!-- Pagination END -->
        </div>
        <!-- Card body START -->
    </div>
    <!-- Card END -->
</div>
<!-- Main content END -->
</div><!-- Row END -->
</div>
</section>
<!-- =======================
Inner part END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->