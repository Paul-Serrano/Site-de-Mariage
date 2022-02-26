<?php


require "../includes/_connect.php";

session_start();


if(isset($_POST["sign-up-submit"])) {
    $id = $_POST["id"];
    $mail = $_POST["mail"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $tel = $_POST["tel"];
    $adress = $_POST["adress"];
    $housing = $_POST['housing-choice'];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $userInfo = [$name, $surname, $mail, $tel, $pass, $adress];
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

for($i = 0; $i < count($userInfo); $i++) {
    if(empty($userInfo[$i])) {
        header('Location:../view/sign-up.php?error=missingInput');
        exit();
    }
}

if ($pass != $pass2) {
    header('Location:../view/sign-up.php?error=differentPasswords');
        exit();
}

    
    ?><pre><?php
    var_dump($userInfo[0]);
    var_dump($userInfo);
    var_dump($name);

    ?></pre><?php

    $bindValues = [':name', ':surname', ':mail', ':tel', ':housing', ':pass', ':adress'];

    try {
        $sqlSignUp = "INSERT INTO user (name,surname,mail,tel,housing,password,adress)
        VALUES ('$name', '$surname', '$mail', '$tel', '$housing', '$pass', '$adress')";
        $reqSignUp = $db->prepare($sqlSignUp);
        // $reqSignUp->bindValue(':name', $name, PDO::PARAM_STR);
        // $req->bindValue(':name', $_POST["name"], PDO::PARAM_STR);
        // $req->bindValue(':surname', $surname, PDO::PARAM_STR);
        // $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        // $req->bindValue(':tel', $tel, PDO::PARAM_STR);
        // $req->bindValue(':housing', $housing, PDO::PARAM_STR);
        // $req->bindValue(':pass', $pass, PDO::PARAM_STR);
        // $req->bindValue(':adress', $adress, PDO::PARAM_STR);
        $reqSignUp->execute();
        $signUpInfo = $reqSignUp->fetchAll();

    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }

 
    if($reqSignUp) {
        $_SESSION["name"] = $name;
        $_SESSION["surname"] = $surname;
        $_SESSION["mail"] = $mail;
        $_SESSION["tel"] = $tel;
        $_SESSION["adress"] = $adress;
        $_SESSION["housing"] = $housing;
        header("Location:../view/index.php?success");

        ?><pre><?php
        var_dump($bindValues);
        var_dump($signUpInfo);
        var_dump($_SESSION["name"]);
        var_dump($_SESSION["surname"]);
        var_dump($mail);
        ?></pre><?php
    }
    
}

?>
