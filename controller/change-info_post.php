<?php


require_once "../includes/_connect.php";
require_once "../includes/_head.php";




if(isset($_POST['change-info-btn'])){

    if(empty($_POST['mail']) && empty($_POST['tel']) && empty($_POST['adress']) && empty($_POST['cp']) && empty($_POST['ville']) && empty($_POST['newpass'])){
        header('Location:../view/change-info.php?error=missingInput');
        exit();
    }

    else {
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $adress = $_POST['adress'];
        $city = $_POST['ville'];
        $cp = $_POST['cp'];
        $pass = $_POST['pass'];
        $newPass = $_POST['newpass'];
        $newPass2 = $_POST['newpass2'];
    
    }

    if($newPass != $newPass2){
        header('Location:../view/change-info.php?error=diffPass');
        exit();
    }

    if($pass != $_SESSION['pass']){
        header('Location:../view/change-info.php?error=wrongPass');
        exit();
    }


    if (!empty($mail)) {
        try {
            $editMail = 'UPDATE user SET mail=:mail WHERE id='.$_SESSION['id'].'';
            $reqEditMail = $db->prepare($editMail);
            $reqEditMail->bindValue(':mail', $mail, PDO::PARAM_STR);
            $reqMail = $reqEditMail->execute();
        }
        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if (!empty($newPass)) {
        try {
            $editPass = 'UPDATE user SET password=:newpass WHERE id='.$_SESSION['id'].'';
            $reqEditPass = $db->prepare($editPass);
            $reqEditPass->bindValue(':newpass', $newPass, PDO::PARAM_STR);
            $reqPass = $reqEditPass->execute();
        }
        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if (!empty($tel)) {
        try {
            $editTel = 'UPDATE user SET tel=:tel WHERE id='.$_SESSION['id'].'';
            $reqEditTel = $db->prepare($editTel);
            $reqEditTel->bindValue(':tel', $tel, PDO::PARAM_STR);
            $reqTel = $reqEditTel->execute();
        }
        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if (!empty($adress)) {
        try {
            $editAdress = 'UPDATE user SET adress=:adress WHERE id='.$_SESSION['id'].'';
            $reqEditAdress = $db->prepare($editAdress);
            $reqEditAdress->bindValue(':adress', $adress, PDO::PARAM_STR);
            $reqAdress = $reqEditAdress->execute();
        }
        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if (!empty($cp)) {
        try {
            $editCp = 'UPDATE user SET cp=:cp WHERE id='.$_SESSION['id'].'';
            $reqEditCp = $db->prepare($editCp);
            $reqEditCp->bindValue(':cp', $cp, PDO::PARAM_STR);
            $reqCp = $reqEditCp->execute();
        }
        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if (!empty($city)) {
        try {
            $editVille = 'UPDATE user SET ville=:ville WHERE id='.$_SESSION['id'].'';
            $reqEditVille = $db->prepare($editVille);
            $reqEditVille->bindValue(':ville', $city, PDO::PARAM_STR);
            $reqVille = $reqEditVille->execute();
        }
        catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if($reqVille) {
        $_SESSION['ville'] == $_POST['ville'];
    }

    if($reqCp) {
        $_SESSION['cp'] == $_POST['cp'];
    }

    if($reqAdress) {
        $_SESSION['adress'] == $_POST['adress'];
    }

    if($reqPass) {
        $_SESSION['pass'] == $_POST['pass'];
    }

    if($reqMail) {
        $_SESSION['mail'] == $_POST['mail'];
    }

    if($reqTel) {
        $_SESSION['tel'] == $_POST['tel'];
    }
    
    
    ?><pre><?php 
    // var_dump($_SESSION['surname']);
    var_dump($reqPass);
    var_dump($reqCp);
    // var_dump(count($signInInfo));
    // var_dump($userPass);
    ?></pre><?php

    header('Location:../view/index.php?success=changeInfo');
}

 ?>