<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google classroom</title>
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">
</head>

<body>
    <div class="d-flex justify-content-between" style="margin: 20px 300px 0 300px; border-bottom: 3px solid blue; ">
    <div>
        <div class="d-flex align-items-center  " style="margin-left: -80px;">
            <i class="bi bi-file-text fa-4x " style="margin-right: 20px;"></i>
            <h2><?=$detail[0][2]?></h2>
        </div>
        <h4>love</h4>
    </div>
        <div>
        <div>
        <i class="bi bi-three-dots-vertical fa-2x"></i>
            </div>
        </div>
    </div>
    <div class=" " style="height: 230px; margin: 20px 300px 0 300px; border-bottom: 1px solid blue;">
    <div class="card w-75 shadow-lg" style="margin-left:60px;">
  <div class="card-body d-flex align-items-center ">
  <img  class="card-img-top" src="assets/files/assignment_files/<?=$detail[0][5]?>" alt="<?=$detail[0][5]?>" style="width:190px; height:130px; margin-right: 40px; ">
  <img aria-hidden="true" role="presentation" jsname="q4uQmd" class=" " src="https://lh3.googleusercontent.com/drive-storage/ANtge_Egnqvo911O6lvktTv-Q9aUd4q9EyLVvMggVti2Gg1Mthl0kSC3wn8-bUadxSIKViR20jGel0ASperf4qn28eqheaV3TBgn4oiAT16x7A=w105-h70-c" data-mime-type="application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-iml="5967">
  <div>

      <h4><?=$detail[0][3]?></h4>
      <p>pdf</p>
  </div>
  </div>
</div>
    </div>
    <div class="" style="height: 250px; height: 230px; margin: 20px 300px 0 300px; ">
        <div class="d-flex align-items-cente " style="height: 60px;">
        <i class="bi bi-people-fill fa-2x " style="margin-right: 20px;"></i>
        <h4>Class comments</h4>
        </div>
        <div class="d-flex">

            <img src="../../assets/images/profiles/IMG-65dc97f47444e1.55245181.jpg" alt="" class="rounded-circle m-3" style="width: 60px; height:60px;">
            <input type="text" id="inputPassword5" class="form-control">
            <i class="bi bi-send-dash fa-2x m-3"></i>
        </div>
    </div>

</body>

</html>