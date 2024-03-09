
<?php
require "../../database/database.php";
$_SESSION["user_id"] = 1; // User's session
$sessionId = $_SESSION["user_id"];
global $connection;
$stemt = $connection->prepare("select * from users where user_id = 34");
$stemt->execute();
$user = $stemt->fetch();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Update Image Profile</title>
    <link rel="stylesheet" href="./edit_Profile.view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <form class="form" id="form" action="controllers/edit_profile.controller.php" enctype="multipart/form-data" method="post">
        <div class="upload">
            <?php
            $id = $user["user_id"];
            $name = $user["user_name"];
            $image = $user["image_url"];
            ?>
            <img src="../../assets/images/profiles/<?php echo $image?>" width=125 height=125 title="">
            <div class="round">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="file" name="image" id="image_url" accept=".jpg, .jpeg, .png">
                <i class="fa fa-camera" style="color: #fff;"></i>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        document.getElementById("image").onchange = function() {
            document.getElementById("form").submit();
        };
    </script>
</body>

</html>