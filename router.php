<?php
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
    '/class' => 'controllers/page_class_ech_class.cntroller/page_in_the_class.php'

];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}

if ($uri !== '/' ) {
    require "layouts/header.php";
    require "layouts/navbar.php";
}


require $page;


if ($uri !== '/' && $uri !== '/join_classrooms' ) {
    require "layouts/footer.php";
}
if ($uri == '/join_classrooms'  ) {
    require "layouts/teacher/footer.php";
}


?>
