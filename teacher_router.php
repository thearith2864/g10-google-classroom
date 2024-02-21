<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/trainer-student' => 'controllers/students/student.controller.php',
    '/trainer-review' => 'controllers/reviews/review.controller.php',
    '/trainer-classroom' => 'controllers/classroom/your_classroom.controller.php',
    '/create-class' => 'controllers/create_class/create_class_form.controller.php',
    '/class-work' => 'controllers/create-classwork/create_classwork.controller.php',
    
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}

if($uri !== '/create-class'){
    require "layouts/teacher/header.php";
    require "layouts/teacher/navbar.php";
}

require $page;

if($uri !== '/create-class'){
    require "layouts/teacher/footer.php";
}
