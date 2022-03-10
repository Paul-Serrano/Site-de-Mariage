<?php


require_once "../includes/_head.php";
require_once "../includes/_connect.php";

$userId = $_SESSION['id'];

try {
    $sqlGetAllUsers = "SELECT * FROM user";
    $reqGetAllUsers = $db->prepare($sqlGetAllUsers);
    $reqGetAllUsers->execute();
    $getAllUsers = $reqGetAllUsers->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $sqlGetAllFood = "SELECT * FROM food";
    $reqGetAllFood = $db->prepare($sqlGetAllFood);
    $reqGetAllFood->execute();
    $getAllFood = $reqGetAllFood->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $sqlGetAllSideGuest = "SELECT * FROM sideguest";
    $reqGetAllSideGuest = $db->prepare($sqlGetAllSideGuest);
    $reqGetAllSideGuest->execute();
    $getAllSideGuest = $reqGetAllSideGuest->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $sqlGetUserInfo = "SELECT * FROM user WHERE id = '$userId'";
    $reqGetUserInfo = $db->prepare($sqlGetUserInfo);
    $reqGetUserInfo->execute();
    $getUserInfo = $reqGetUserInfo->fetch();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$userName = $getUserInfo["surname"];
$userName .= " ";
$userName .= $getUserInfo["name"];

$userCpVille = $getUserInfo["cp"];
$userCpVille .= " ";
$userCpVille .= $getUserInfo["ville"];

try {
    $sqlGetUserFood = "SELECT * FROM food WHERE id = '$userId'";
    $reqGetUserFood = $db->prepare($sqlGetUserFood);
    $reqGetUserFood->execute();
    $getUserFood = $reqGetUserFood->fetch();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$food = [];

for($i = 0; $i < 6; $i++) {
    if(!empty($getUserFood['type'.$i.''])) {
        array_push($food, $getUserFood['type'.$i.'']);
    }
}

try {
    $sqlGetUserSideGuest = "SELECT * FROM sideguest WHERE id = '$userId'";
    $reqGetUserSideGuest = $db->prepare($sqlGetUserSideGuest);
    $reqGetUserSideGuest->execute();
    $getUserSideGuest = $reqGetUserSideGuest->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

?><pre><?php
// var_dump($getUserSideGuest);
?></pre><?php

?>