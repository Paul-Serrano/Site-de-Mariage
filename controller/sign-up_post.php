<?php


require "../includes/_connect.php";


if(isset($_POST["sign-up-submit"])) {
    $mail = $_POST["mail"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $tel = $_POST["tel"];
    $adress = $_POST["adress"];
    $housing = $_POST['housing-choice'];
    $pass = $_POST["pass"];
    $pass2 = $_POST["pass2"];
    $userInfo = [$name, $surname, $mail, $tel, $pass, $pass2, $adress];

    for($i = 0; $i < count($userInfo); $i++) {
        if(empty($userInfo[$i])) {
            header('Location:../view/sign-up.php?error=missingInput');
            exit();
        }
    }
    
    if ($pass !== $pass2) {
        header('Location:../view/sign-up.php?error=differentPasswords');
        exit();
    }


    for($i = 1; $i < 7; $i++) {
        if(isset($_POST['food-'.$i.''])) {
            $food[$i] = $_POST["food-".$i.""];
        }
        else {
            $food[$i] = "";
        }
    
    }

    $sideGuest = [];

    for($i = 0; $i < 5; $i++) {
        if(isset($_POST["sideGuest-name-".$i.""]) || isset($_POST["sideGuest-surname-".$i.""]) || isset($_POST["sideGuest-age-".$i.""])) {

            if (isset($_POST["sideGuest-name-".$i.""])) {
                $sideGuestName[$i] = $_POST["sideGuest-name-".$i.""];
            }
            else {
                $sideGuestName[$i] = "";
            }
            if (isset($_POST["sideGuest-surname-".$i.""])) {
                $sideGuestSurname[$i] = $_POST["sideGuest-surname-".$i.""];
            }
            else {
                $sideGuesSurname[$i] = "";
            }
            if (isset($_POST["sideGuest-age-".$i.""])) {
                $sideGuestAge[$i] = $_POST["sideGuest-age-".$i.""];
            }
            else {
                $sideGuestAge[$i] = "";
            }
            array_push($sideGuest, [$sideGuestName[$i], $sideGuestSurname[$i], $sideGuestAge[$i]]);

        }
    }

// for($j = 0; $j < count($sideGuest); $j++) {
//     for($i = 0; $i < 2; $i++) {
//         $sideGuestFoodSmall[$i] = $_POST["sideGuest-food-".$i.""];
//     }
//     $sideGuestFoodBig[$j] =  $sideGuestFoodSmall;
// }

    
    ?><pre><?php
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


    try {
        $sqlGetId = "SELECT id FROM user WHERE mail = '$mail'";
        $reqGetId = $db->prepare($sqlGetId);
        $reqGetId->execute();
        $id = $reqGetId->fetchAll();
    
    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }

      try {
            $sqlSignUpFood = "INSERT INTO food (type0, type1, type2, type3, type4, type5)
            VALUES ('$food[1]', '$food[2]', '$food[3]', '$food[4]', '$food[5]', '$food[6]')";
            $reqSignUpFood = $db->prepare($sqlSignUpFood);
            // $reqSignUp->bindValue(':name', $name, PDO::PARAM_STR);

            $reqSignUpFood->execute();
            $signUpFood = $reqSignUpFood->fetchAll();
        }
    
    
        catch (PDOException $e) {
            $db = null;
            echo
          'Erreur : '.$e->getMessage();
        }

        for ($i = 0; $i < count($sideGuest); $i++){
            if($sideGuest[$i][2] < 18) {
                $style[$i] = "Enfant";
            }
            else if($sideGuest[$i][2] > 65) {
                $style[$i] = "Personne agée";
            }
            else {
                $style[$i] = "Adulte";
            }
            $sideGuest[$i][3] = $style[$i];
        }

        for($i = 0; $i < count($sideGuest); $i++) {

            try {
                $sqlSignUpSideGuest = "INSERT INTO sideGuest (name, surname, style, age)
                VALUES ('$sideGuest[$i][0]', '$sideGuest[$i][1]', '$sideGuest[$i][3]','$sideGuest[$i][2]')";
                $reqSignUpSideGuest = $db->prepare($sqlSignUpSideGuest);
                // $reqSignUp->bindValue(':name', $name, PDO::PARAM_STR);
    
                $reqSignUpSideGuest->execute();
                $signUpSideGuest = $reqSignUpFood->fetchAll();
            }
        
        
            catch (PDOException $e) {
                $db = null;
                echo
              'Erreur : '.$e->getMessage();
            }
    

        }
        
        

        






 
    if($reqSignUp) {
        $_SESSION["name"] = $name;
        $_SESSION["surname"] = $surname;
        $_SESSION["mail"] = $mail;
        $_SESSION["tel"] = $tel;
        $_SESSION["adress"] = $adress;
        $_SESSION["housing"] = $housing;
        // header("Location:../view/index.php?success=signUp");

        ?><pre><?php
        var_dump($id[0]['id']);
        var_dump($food);
        var_dump($sideGuest);
        var_dump($style[0]);
        ?></pre><?php
    }
    
}

?>
