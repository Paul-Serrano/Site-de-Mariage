<?php


require "../includes/_connect.php";


if(isset($_POST["sign-up-submit"])) {
    $mail = htmlspecialchars($_POST["mail"]);
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $tel = htmlspecialchars($_POST["tel"]);
    $adress = htmlspecialchars($_POST["adress"]);
    if(isset($_POST['housing-choice'])) {
        $housing = $_POST['housing-choice'];
    }
    else{
        $housing = "non";
    }
    $cp = htmlspecialchars($_POST["cp"]);
    $ville = htmlspecialchars($_POST["ville"]);
    $pass = htmlspecialchars($_POST["pass"]);
    $pass2 = htmlspecialchars($_POST["pass2"]);
    $code = htmlspecialchars($_POST["code"]);
    $userInfo = [$name, $surname, $mail, $tel, $pass, $pass2, $adress, $cp, $ville];

    for($i = 0; $i < count($userInfo); $i++) {
        if(empty($userInfo[$i])) {
            header('Location:../view/sign-up.php?error=missingInput');
            exit();
        }
    }

    try {
        $sqlGetMail = "SELECT mail FROM user";
        $reqGetMail = $db->prepare($sqlGetMail);
        $reqGetMail->execute();
        $existingMail = $reqGetMail->fetchAll();
    
    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }

    for($i = 0; $i < count($existingMail); $i++) {
        if($existingMail[$i]['mail'] == $mail)  {
            header('Location:../view/sign-up.php?error=knownMail');
            exit();
        }
    }
    
    if ($pass !== $pass2) {
        header('Location:../view/sign-up.php?error=differentPasswords');
        exit();
    }

    if(empty($code)) {
        header('Location:../view/sign-up.php?error=missingCode');
        exit();
    }

    if($code !== '0000') {
        header('Location:../view/sign-up.php?error=wrongCode');
        exit();
    }

    if(!is_numeric($cp)) {
        header('Location:../view/sign-up.php?error=wrongCp');
        exit();
    }

    ?><pre><?php
    // var_dump($cp);
    // var_dump(is_numeric($cp));
    ?></pre><?php




    for($i = 1; $i < 7; $i++) {
        if(isset($_POST['food-'.$i.''])) {
            $food[$i] = htmlspecialchars($_POST["food-".$i.""]);
        }
        else {
            $food[$i] = "";
        }
    }

    for($i = 1; $i < count($food); $i++) {
        if(empty($food[$i])){
            $foodChoice = false;
        }
        else {
            $foodChoice = true;
            break;
        }
    }

    $sideGuest = [];

    for($i = 0; $i < 5; $i++) {
        if(isset($_POST["sideGuest-name-".$i.""]) || isset($_POST["sideGuest-surname-".$i.""]) || isset($_POST["sideGuest-age-".$i.""])) {

            if (isset($_POST["sideGuest-name-".$i.""])) {
                $sideGuestName[$i] = htmlspecialchars($_POST["sideGuest-name-".$i.""]);
            }
            else {
                $sideGuestName[$i] = "";
            }
            if (isset($_POST["sideGuest-surname-".$i.""])) {
                $sideGuestSurname[$i] = htmlspecialchars($_POST["sideGuest-surname-".$i.""]);
            }
            else {
                $sideGuesSurname[$i] = "";
            }
            if (isset($_POST["sideGuest-age-".$i.""])) {
                $sideGuestAge[$i] = htmlspecialchars($_POST["sideGuest-age-".$i.""]);
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

    try {
        $sqlSignUp = "INSERT INTO user (name,surname,mail,tel,housing,password,adress,cp,ville)
        VALUES (:name, :surname, :mail, :tel, :housing, :pass, :adress, :cp, :ville)";
        $reqSignUp = $db->prepare($sqlSignUp);
        $reqSignUp->bindValue(':name', $name, PDO::PARAM_STR);
        $reqSignUp->bindValue(':surname', $surname, PDO::PARAM_STR);
        $reqSignUp->bindValue(':mail', $mail, PDO::PARAM_STR);
        $reqSignUp->bindValue(':tel', $tel, PDO::PARAM_STR);
        $reqSignUp->bindValue(':housing', $housing, PDO::PARAM_STR);
        $reqSignUp->bindValue(':pass', $pass, PDO::PARAM_STR);
        $reqSignUp->bindValue(':adress', $adress, PDO::PARAM_STR);
        $reqSignUp->bindValue(':cp', $cp, PDO::PARAM_STR);
        $reqSignUp->bindValue(':ville', $ville, PDO::PARAM_STR);
        $reqSignUp->execute();
        $signUpInfo = $reqSignUp->fetchAll();

    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }

    if($reqSignUp) {
        try {
            $sqlGetId = "SELECT id FROM user WHERE mail = '$mail'";
            $reqGetId = $db->prepare($sqlGetId);
            $reqGetId->execute();
            $id = $reqGetId->fetchAll();
        
        } catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if($foodChoice) {
        try {
            $sqlSignUpFood = "INSERT INTO food (type0, type1, type2, type3, type4, type5, id)
            VALUES (:food1, :food2, :food3, :food4, :food5, :food6, :id)";
            $reqSignUpFood = $db->prepare($sqlSignUpFood);
            $reqSignUpFood->bindValue(':food1', $food[1], PDO::PARAM_STR);
            $reqSignUpFood->bindValue(':food2', $food[2], PDO::PARAM_STR);
            $reqSignUpFood->bindValue(':food3', $food[3], PDO::PARAM_STR);
            $reqSignUpFood->bindValue(':food4', $food[4], PDO::PARAM_STR);
            $reqSignUpFood->bindValue(':food5', $food[5], PDO::PARAM_STR);
            $reqSignUpFood->bindValue(':food6', $food[6], PDO::PARAM_STR);
            $reqSignUpFood->bindValue(':id', $id[0]["id"], PDO::PARAM_STR);
            // $reqSignUp->bindValue(':name', $name, PDO::PARAM_STR);
    
            $reqSignUpFood->execute();
            $signUpFood = $reqSignUpFood->fetchAll();
        }
    
    
        catch (PDOException $e) {
            $db = null;
            echo
            'Erreur : '.$e->getMessage();
        }
    
    }
    
    for ($i = 0; $i < count($sideGuest); $i++){
        if($sideGuest[$i][2] < 18) {
            $style[$i] = htmlspecialchars("Enfant");
        }
        else if($sideGuest[$i][2] > 65) {
            $style[$i] = htmlspecialchars("Personne agée");
        }
        else {
            $style[$i] = htmlspecialchars("Adulte");
        }
        $sideGuest[$i][3] = $style[$i];
    }

    for($i = 0; $i < count($sideGuest); $i++) {

        try {
            $sqlSignUpSideGuest = "INSERT INTO sideGuest (name, surname, style, age, id)
            VALUES (:name, :surname, :type, :age, :id)";
            $reqSignUpSideGuest = $db->prepare($sqlSignUpSideGuest);
            $reqSignUpSideGuest->bindValue(':name', $sideGuest[$i][0], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':surname', $sideGuest[$i][1], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':type', $sideGuest[$i][3], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':age', $sideGuest[$i][2], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':id', $id[0]["id"], PDO::PARAM_STR);

            $reqSignUpSideGuest->execute();
            $signUpSideGuest = $reqSignUpSideGuest->fetchAll();
        }
    
    
        catch (PDOException $e) {
            $db = null;
            echo
            'Erreur : '.$e->getMessage();
        }
    }

    $sideGuestFoodIndividual = [];
    $sideGuestFood = [];

    for($i = 0; $i < 5; $i++) {
        for($j = 0; $j < 5; $j++) {
            if(isset($_POST['sideGuest-food-'.$i.'-'.$j.''])){
                array_push($sideGuestFoodIndividual, $_POST['sideGuest-food-'.$i.'-'.$j.'']);
            }
        }
        if(isset($_POST['sideGuest-food-'.$i.'-0']))
        array_push($sideGuestFood, $sideGuestFoodIndividual);
        $sideGuestFoodIndividual = [];
    }

    $userId = $id[0]['id'];

    if(isset($reqSignUpSideGuest)) {
        try {
            $sqlGetSideGuestId = "SELECT sideGuest_id FROM sideguest WHERE id = '$userId'";
            $reqGetSideGuestId = $db->prepare($sqlGetSideGuestId);
            $reqGetSideGuestId->execute();
            $sideGuestId = $reqGetSideGuestId->fetchAll();
        
        } catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }
    }

    if(isset($reqSignUpSideGuest) && !empty($sideGuestFood)) {

        for($i = 0; $i < count($sideGuestId); $i++) {

            try {
                $sqlSignUpGuestFood = "INSERT INTO food (type0, type1, type2, type3, type4, type5, sideGuest_id)
                VALUES (:food1, :food2, :food3, :food4, :food5, :food6, :sideGuest_id)";
                $reqSignUpGuestFood = $db->prepare($sqlSignUpGuestFood);
                for($j = 0; $j < 6; $j++) {
                    $k = $j + 1;
                    if(isset($sideGuestFood[$i][$j])) {
                        $reqSignUpGuestFood->bindValue(':food'.$k.'', $sideGuestFood[$i][$j], PDO::PARAM_STR);
                    }
                    else {
                        $reqSignUpGuestFood->bindValue(':food'.$k.'', "", PDO::PARAM_STR);
                    }
                }
                $reqSignUpGuestFood->bindValue(':sideGuest_id', $sideGuestId[$i]['sideGuest_id'], PDO::PARAM_STR);
                $reqSignUpGuestFood->execute();
                $signUpGuestFood = $reqSignUpGuestFood->fetchAll();
            }
        
        
            catch (PDOException $e) {
                $db = null;
                echo
                'Erreur : '.$e->getMessage();
            }
    
        }

    }
    

    ?><pre><?php
    ?></pre><?php
 
    if($reqSignUp) {

        session_start();
        $_SESSION['id'] = $id[0]["id"];
        $_SESSION["name"] = $name;
        $_SESSION["surname"] = $surname;
        $_SESSION["mail"] = $mail;
        $_SESSION["tel"] = $tel;
        $_SESSION["adress"] = $adress;
        $_SESSION["housing"] = $housing;
        $_SESSION["pass"] = $pass;
        $_SESSION["ville"] = $ville;
        $_SESSION["cp"] = $cp;
        header("Location:../view/index.php?success=signUp&page=index");

  
    }
    
}

?>
