<?php
if (!REDIDNT) die();
function getUserByUsername($username) {
    global $db;
    $q = $db->prepare("SELECT * FROM `users` WHERE `username`=:username");
    $q->bindParam(":username", $username);
    $q->execute();
    return $q->fetchObject();
}