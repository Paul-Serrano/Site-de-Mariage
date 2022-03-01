<?php


require_once "../includes/_head.php";
require_once "../includes/_connect.php";

$userId = $_SESSION['id'];

try {
    $sqlGetUserInfo = "SELECT * FROM user WHERE id = '$userId'";
    $reqGetUserInfo = $db->prepare($sqlGetUserInfo);
    $reqGetUserInfo->execute();
    $getUserInfo = $reqGetUserInfo->fetch();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

?><pre><?php
var_dump($getUserInfo);
?></pre><?php

?>