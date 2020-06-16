<?php
if (!REDIDNT) die();
function getPostsBySubName($name, $page) {
    global $db;
    $q = $db->prepare("SELECT `ID` FROM `subs` WHERE `name`=:name");
    $q->bindParam(":name", $name);
    $q->execute();
    $q = $q->fetchObject();
    if (empty($q->ID)) return [];
    $p = $db->prepare("SELECT * FROM `posts` WHERE `onsub`=:onsub LIMIT $page,25");
    $p->bindParam(":onsub",$q->ID);
    $p->execute();
    return $p->fetchAll();
}
function getPostById($id) {
    global $db;
    $p = $db->prepare("SELECT * FROM `posts` WHERE `ID`=:id");
    $p->bindParam(":id",$id);
    $p->execute();
    return $p->fetchObject();
}