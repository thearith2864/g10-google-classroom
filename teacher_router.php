<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/trainer-student' => 'controllers/students/student.controller.php',
    '/trainer-review' => 'controllers/reviews/review.controller.php',
    '/trainer-classroom' => 'controllers/classroom/your_classroom.controller.php',
    '/create-class' => 'controllers/create_class/create_class_form.controller.php',
    '/class-update' => 'controllers/form_update/form_update.controller.php',
    '/class-work' => 'controllers/create-classwork/create_classwork.controller.php',
    '/submission' => 'controllers/to_review/submission.controller.php',
    '/todos' => 'controllers/todo_contreoller/todo_page_controllers.php',
    '/archived_classroom' => 'controllers/archived_classroom_controller/display_archived_classroom_controller.php',
    '/calendar' => "controllers/calendar_controller/calendar_controller.php"
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}

if($uri !== '/create-class' && $uri !== '/class-update') {
    require "layouts/teacher/header.php";
    require "layouts/teacher/navbar.php";
}

require $page;

if($uri !== '/create-class' && $uri !== '/class-update' && $uri !== '/to-review'){
    require "layouts/teacher/footer.php";
}
