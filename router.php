<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' => 'views/default/default.php',
    '/home' => 'controllers/home/home.controller.php',
    '/trainers' => 'controllers/trainers/trainer.controller.php',
    '/students' => 'controllers/students/student.controller.php',
    '/join_classrooms' => 'controllers/classroom/join_classroom.controller.php',
    '/reports' => 'controllers/reports/report.controller.php',
    '/reviews' => 'controllers/reviews/review.controller.php',
    '/class' => 'controllers/page_class_each_class.cntroller/page_in_the_class.php',
    '/signup' => 'controllers/signup/create_user.controller.php',
    '/signin' => 'controllers/signin/signin.controller.php',
    '/admin' => 'controllers/admin/admin.controller.php',
<<<<<<< HEAD
    '/class-update' => 'controllers/form_update/form_update.controller.php'
=======
    '/assignment' => 'controllers/assignment/assignment.controllers.php',
>>>>>>> page_assignment

];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}

<<<<<<< HEAD
if ($uri !== '/' && $uri !== '/class-update' ) {
=======
if ($uri !== '/' && $uri !== '/assignment' ) {
>>>>>>> page_assignment
    require "layouts/header.php";
    require "layouts/navbar.php";
}


require $page;


<<<<<<< HEAD

if ($uri !== '/' && $uri !== '/join_classrooms' && $uri !== '/class-update') {
    require "layouts/footer.php";
}



?>
=======
if ($uri !== '/' && $uri !== '/join_classrooms'&& $uri !== '/assignment'  ) {
    require "layouts/footer.php";
}
if ($uri == '/join_classrooms'  ) {
    require "layouts/teacher/footer.php";
}
>>>>>>> page_assignment
