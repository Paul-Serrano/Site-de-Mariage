<?php


require "includes/_connect.php";

var_dump("salut");



if(isset($_POST["sign-up-submit"])) {
    $mail = $_POST["mail"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $tel = $_POST["tel"];
    $adress = $_POST["adress"];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    // $nbOfAdditionnalFood = 
for($i = 1; $i < 3; $i++) {
    $food[$i] = $_POST["food-".$i.""];
}

for($i = 0; $i < 2; $i++) {
    $sideGuestName[$i] = $_POST["sideGuest-name-".$i.""];
    $sideGuestsurname[$i] = $_POST["sideGuest-surname-".$i.""];
    $sideGuestAge[$i] = $_POST["sideGuest-age-".$i.""];
    $sideGuest[$i] = [$sideGuestName[$i], $sideGuestsurname[$i], $sideGuestAge[$i]];
}

for($j = 0; $j < count($sideGuest); $j++) {
    for($i = 0; $i < 2; $i++) {
        $sideGuestFoodSmall[$i] = $_POST["sideGuest-food-".$i.""];
    }
    $sideGuestFoodBig[$j] =  $sideGuestFoodSmall;
}

    
    ?><pre><?php
    var_dump($sideGuest);
    var_dump(count($sideGuest));
    var_dump($sideGuestName);
    var_dump($sideGuestFoodBig);
    ?></pre><?php
}

?>
