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

$sideGuest = [];

try {
    $sqlGetUserSideGuest = "SELECT * FROM sideguest WHERE id = '$userId'";
    $reqGetUserSideGuest = $db->prepare($sqlGetUserSideGuest);
    $reqGetUserSideGuest->execute();
    $getUserSideGuest = $reqGetUserSideGuest->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

try {
    $sqlGetSideGuestId = "SELECT sideGuest_id FROM sideguest Where id = '$userId'";
    $reqGetSideGuestId = $db->prepare($sqlGetSideGuestId);
    $reqGetSideGuestId->execute();
    $getSideGuestId = $reqGetSideGuestId->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$getUserSideGuestFood = [];

for($i = 0; $i < count($getSideGuestId); $i++) {
    $sideGuestId = $getSideGuestId[$i]['sideGuest_id'];
    try {
        $sqlGetUserSideGuestFood = "SELECT * FROM food WHERE sideguest_id = '$sideGuestId'";
        $reqGetUserSideGuestFood = $db->prepare($sqlGetUserSideGuestFood);
        $reqGetUserSideGuestFood->execute();
        $getUserSideGuestFoodInit = $reqGetUserSideGuestFood->fetchAll();
        $getUserSideGuestFood[$i] = $getUserSideGuestFoodInit;
    
    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }
}

$sideGuestFoodEmpty = [];
$sideGuestFoodIndiv = [];
$sideGuestFood = [];
for($j = 0; $j < count($getUserSideGuestFood); $j++) {
    $sideGuestFoodIndiv = [];
    for($i = 0; $i < 6; $i++) {
        if(!empty($getUserSideGuestFood[$j][0]['type'.$i.''])) {
            array_push($sideGuestFoodIndiv, $getUserSideGuestFood[$j][0]['type'.$i.'']);
        }
    }
    array_push($sideGuestFood, $sideGuestFoodIndiv);
}

?><pre><?php
// var_dump($sideGuestFoodIndiv);
// var_dump($sideGuestFood);
// var_dump($getUserSideGuestFood);
?></pre><?php

?>