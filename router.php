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
    '/assignment' => 'controllers/assignment/assignment.controllers.php',
    '/join_class' => 'controllers/join_class/join_class_form.controller.php',
    '/form_edit_assignment' => 'controllers/assignment/form_edit_assignment.controller.php',
    '/detait_assignment' => 'controllers/detait_assignment_for teacher_controller/detail_assignment_controller.php',
    '/editprofile'=>'controllers/Setting/Setting.controller.php',
    '/student_classwork' => 'controllers/student_classworks/student_classwork.controller.php',
    '/submit-form'=> 'controllers/student_classworks/classwork_submit_form.controller.php',

    

        

    

];
if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}

if ($uri !== '/' && $uri !== '/class-update' && $uri !== '/join_class') {
    require "layouts/header.php";
    require "layouts/navbar.php";
}


require $page;



if ($uri !== '/' && $uri !== '/join_classrooms' && $uri !== '/class-update' && $uri !== '/join_class'&&
 $uri !== '/submit-form' && $uri !== '/student_classwork' ) {
    require "layouts/footer.php";
}






