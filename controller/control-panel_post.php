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

$foodClass = "food"

?><pre><?php
?></pre><?php
?>