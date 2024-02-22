<?php

if (isset($_SESSION['user'])) {
    header('Location: /home');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="bg-info text-white">
    <main>
    <h1 class="text-center mt-5 pt-5">Manage teaching and learning with <br> <span class="text-danger">Google</span> Classroom</h1>
    <p class="text-center mt-5">You need to signIn if you don't have any account yet and you need to logIn if you already have an account to use Google Classroom</p>
    <div class="d-flex justify-content-center">
        <a href="/signup"><button class="btn btn-primary bg-danger text-white px-4 mt-4 m-2">SignUP</button></a>
        <a href="/signin"><button class="btn btn-primary bg-danger text-white px-4 mt-4 m-2">SignIn</button></a>
    </div>
    </main>
</body>
</html>