<?php
include "config.php";
session_start();
// Check if user is logged in
include 'php/user_check.php';
// Include functions.
include 'php/functions/sorry.php';
// Core engine
include 'php/index.php';
?>