<div class="contianer d-flex mx-5 w-100">
    <div>
        <i class="bi bi-file-earmark-medical-fill fa-3x m-3 text-primary"></i>
    </div>
    <!-- Details about classwork -->
    <div class="w-50 px-5">
        <div class="d-flex justifycontent-between">
            <div class="p-2 w-100">
                <h5 class="card-title"><?= $chooose[0]['title'] ?></h5>
                <p class="card-text">3/4/2024</p>
                                    
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
                <p><?= $chooose[0]['create_date'] ?></p>                   
            </div>
        </div>
        <div>
            <p>_______________________________________________________________________________</p>
        </div>
        <div>
            <p>Classwork file </p>
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
                <p class="text-danger" style="font-size: 18px;">Missing</p>
            </div>
            <div>
                <form action="" method="post" class="d-flex flex-column">
                    <div class="form-group mb-3">
                        <input type="file" class="form-control">
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