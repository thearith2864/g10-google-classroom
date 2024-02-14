<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs("/trainer-classroom") || urlIs("/trainer-student") || urlIs("/trainer-review")) { 
    require "teacher_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}


