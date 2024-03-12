<?php
session_start();

$_SESSION['popup_uploadPf'] = "showpopUp";

header('Location: /home');