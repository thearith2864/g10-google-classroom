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
            <p>_______________________________________________________________________________</p>
        </div>
        <div>
        <div class="p-4" style="height: 180px;  width:90%; margin-left:15px;">
                <div class="card p-2 shadow-sm" style="width: 100%; border:1px solid black;">
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>"><i class="bi bi-file-earmark-ruled-fill fa-4x " style="margin-right:18px;"></i></a>

                        </div>
                        <div>
                            <a href="assets/files/assignment_files/<?= $chooose[0]['file_work'] ?>    ">
                                <h4><?= $chooose[0]['file_work'] = substr($chooose[0]['file_work'], 0, 20) ?></h4>
                            </a>

                            <p><?= $pdf[0]['file_work'] = substr($pdf[0]['file_work'], -3) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            
            <p style="color: gray;">_______________________________________________________________________________</p>
        </div>
        <div>
            <div class="d-flex align-items-end">
                <div >
                    <i class="bi bi-people-fill fa-2x mr-3 text-primary"></i>
                </div>
                <div>
                    <p style="margin-bottom: 7px; margin-left:7px;">Class comment</p>
                </div>
            </div>
            <div>
                <form action="" method="post">
                    <input type="text" placeholder="Add class comment..." style="width:300px; border:solid 0.5px gray; border-radius: 10px; padding:4px;">
                    <button type="submit" style="border:none; background:none">Send</button>
                </form>
            </div>

        </div>
    </div>
    <!-- Form for submit the classwork  -->
    <div  style="width:350px; height:250px; margin-left: 45px;">
        <div class="w-100 p-4" style=" border: solid 1px black; border-radius: 10px;">
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
                <form action="../../controllers/student_classworks/submit_classwork.controller.php?" method="post" class="d-flex flex-column" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="file" class="form-control" name="file">
                        <input type="text" class="form-control" name="idAS" value="<?=$_GET['id']?>" hidden>
                        <input type="text" class="form-control" name="idCS" value="<?=$_GET['codeclass']?>" hidden>
                    </div>
                    <div class="mt-auto">
                        <button type="submit" class="btn btn-primary w-100">Mark as done</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class=" mt-4 p-4" style=" border: solid 1px black; border-radius: 10px;">
            <div class="d-flex align-items-end">
                <div >
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