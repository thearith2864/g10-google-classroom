<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs("/trainer-classroom") || urlIs("/trainer-student") || urlIs("/create-class") || urlIs("/class-update") || urlIs("/todos")) { 
    require "teacher_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}


