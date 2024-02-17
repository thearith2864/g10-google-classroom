<?php
require_once("../../database/database.php");
require_once("../../models/teacher.model.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $className = $_POST['className'];
    if (!empty($className)) {
        var_dump($className);
        // The className input is not empty

        // Rest of your code...

        $classroom_name = $className;

        // create class code by random
        $numbers = range(0, 9);
        $alphabets = range('a', 'z');
        $combined = array_merge($numbers, $alphabets);
        $classroom_code = '';
        for ($i = 0; $i < 5; $i++) {
            $randomIndex = array_rand($combined);
            $classroom_code .= $combined[$randomIndex];
        }

        $teacher_id = 1;
        $section = $_POST['section'];
        $subject = $_POST['subject'];
        $room = $_POST['room'];

        $isCreate = createClass($classroom_name, $classroom_code, $section, $subject, $room, $teacher_id);
        if ($isCreate) {
            header('location: /trainer-classroom');
        }
    } else {
        $erorrs = ['Class Name can not be empty'];
        header('location:/create-class');
    }
}