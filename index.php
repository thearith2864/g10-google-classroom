<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs("/trainer-classroom") || urlIs("/trainer-student") || urlIs("/create-class") || urlIs("/class-update") || urlIs("/submission")|| urlIs("/todos") || urlIs("/trainer-review")  || urlIs("/trainer-class") || urlIs("/archived_classroom") || urlIs("/calendar")) { 
    require "teacher_router.php";
} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}


