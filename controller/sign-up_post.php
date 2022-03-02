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

    ?><pre><?php
    var_dump($existingMail);
    ?></pre><?php
    
    if ($pass !== $pass2) {
        header('Location:../view/sign-up.php?error=differentPasswords');
        exit();
    }


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

    
    ?><pre><?php
    ?></pre><?php


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

    if($foodChoice) {
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
            $sqlSignUpSideGuest = "INSERT INTO sideGuest (name, surname, style, age)
            VALUES (:name, :surname, :type, :age)";
            $reqSignUpSideGuest = $db->prepare($sqlSignUpSideGuest);
            $reqSignUpSideGuest->bindValue(':name', $sideGuest[$i][0], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':surname', $sideGuest[$i][1], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':type', $sideGuest[$i][3], PDO::PARAM_STR);
            $reqSignUpSideGuest->bindValue(':age', $sideGuest[$i][2], PDO::PARAM_STR);

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

        try {
            $sqlGetId = "SELECT id FROM user WHERE mail = '$mail'";
            $reqGetId = $db->prepare($sqlGetId);
            $reqGetId->execute();
            $id = $reqGetId->fetchAll();
        
        } catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }

        session_start();
        $_SESSION['id'] = $id;
        $_SESSION["name"] = $name;
        $_SESSION["surname"] = $surname;
        $_SESSION["mail"] = $mail;
        $_SESSION["tel"] = $tel;
        $_SESSION["adress"] = $adress;
        $_SESSION["housing"] = $housing;
        $_SESSION["pass"] = $pass;
        $_SESSION["ville"] = $ville;
        $_SESSION["cp"] = $cp;
        header("Location:../view/index.php?success=signUp");

        ?><pre><?php
        var_dump($mail);
        var_dump($signUpInfo);
        var_dump($sqlGetId);
        var_dump($reqGetId);
        ?></pre><?php
    }
    
}

?>
