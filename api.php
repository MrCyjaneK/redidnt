<?php
include "config.php";
session_start();
// Check if user is logged in
include 'php/user_check.php';
if (!AUTH_OK) die('Please login.');
?>
OK!

post('/api.php', {
    "action": "react",
    "reaction": reaction,
    "postid": postid
});
