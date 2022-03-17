<?php

require "../includes/_connect.php";


try {
    $sqlGetUsers = "SELECT * FROM user";
    $reqGetUsers = $db->prepare($sqlGetUsers);
    $reqGetUsers->execute();
    $getUsers = $reqGetUsers->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$getNoHousingUsers = [];

for($i = 0; $i < count($getUsers); $i++) {
    if($getUsers[$i]['housing'] == "non") {
        array_push($getNoHousingUsers, $getUsers[$i]);
    }
}

try {
    $sqlGetFood = "SELECT * FROM food";
    $reqGetFood = $db->prepare($sqlGetFood);
    $reqGetFood->execute();
    $getFood = $reqGetFood->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$getUserFood = [];

for($i = 0; $i < count($getFood); $i++) {
    if(!empty($getFood[$i]["id"])) {
        array_push($getUserFood, $getFood[$i]["id"]);
    }
}

try {
    $sqlGetSideGuest = "SELECT * FROM sideguest";
    $reqGetSideGuest = $db->prepare($sqlGetSideGuest);
    $reqGetSideGuest->execute();
    $getSideGuest = $reqGetSideGuest->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

$getUserChild = [];
$getUserSide = [];
$getUserOld = [];

for($i = 0; $i < count($getSideGuest); $i++) {
    if($getSideGuest[$i]['style'] == "Enfant") {
        array_push($getUserChild, $getSideGuest[$i]["id"]);
    }
    if($getSideGuest[$i]['style'] == "Adulte") {
        array_push($getUserSide, $getSideGuest[$i]["id"]);
    }
    if($getSideGuest[$i]['style'] == "Personne agée") {
        array_push($getUserOld, $getSideGuest[$i]["id"]);
    }
}



?><pre><?php
// var_dump($getSideGuest);
// var_dump($getUserSide);
// var_dump($getUserOld);
// var_dump($getUserChild);
?></pre><?php


if(isset($_POST['reset-searchbar'])) {
    header('Location:../view/control-panel.php?page=panel');
}

?>