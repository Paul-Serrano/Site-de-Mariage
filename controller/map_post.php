<?php

require_once "../includes/_connect.php";
require_once "../includes/_head.php";

$connect = false;

if(isset($_SESSION['id']) && $_SESSION['go']) {

    $connect = true;

    $id = $_SESSION['id'];

    try {
        $sqlGetAdress = "SELECT adress, cp, ville FROM user WHERE id = '$id'";
        $reqGetAdress = $db->prepare($sqlGetAdress);
        $reqGetAdress->execute();
        $startPoint = $reqGetAdress->fetch();
    
    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }

    $cp = $startPoint['cp'];
    $ville = $startPoint['ville'];
    $adress = $startPoint['adress'];

    for($i = 0; $i < strlen($adress); $i++) {
        if($adress[$i] == " "){
            $adress[$i] = "+";
        }
    }

    $weddingWay = "https://www.google.com/maps/dir/".$adress.",+".$cp."+".$ville."/Mairie,+18+Rue+la+Carr%C3%A8re,+64370+Arthez-de-B%C3%A9arn";
    $partyWay = "https://www.google.com/maps/dir/".$adress.",+".$cp."+".$ville."/Salle+des+fêtes+-+Maison+pour+tous+d'Hagetaubin,+Hagetaubin";
}





?><pre><?php
?></pre><?php


?>