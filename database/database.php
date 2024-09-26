<?php

$hostname = "localhost";
$database = "googleclassroom";
$username = "root";
$password = "";
$dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";
$connection = new PDO($dsn, $username, $password);

