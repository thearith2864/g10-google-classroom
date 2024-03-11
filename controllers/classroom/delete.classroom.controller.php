<?php

require "../../database/database.php";
require "../../models/teacher.model.php";

deleteClass( $_GET['id']);
header('Location: /trainer-classroom');
