<?php
include "config.php";
session_start();
// Check if user is logged in
include 'php/user_check.php';
// Include functions.
include 'php/functions/sorry.php';
include 'php/functions/getUser.php';
include 'php/functions/getPosts.php';
// Core engine
include 'php/index.php';
?>
