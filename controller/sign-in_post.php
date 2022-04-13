<?php

require_once "../includes/_connect.php";

if(isset($_POST['sign-in-submit'])){

    
    if(empty($_POST['mail'])) {
        header('Location:../view/sign-in.php?error=missingMail');
        exit();
    }

    if(empty($_POST['pass'])) {
        header('Location:../view/sign-in.php?error=missingPass');
        exit();
    }
    
    $mail = $_POST['mail'];

    try {
        $sqlSignIn = "SELECT * FROM user WHERE mail = '$mail'";
        $reqSignIn = $db->prepare($sqlSignIn);
        $reqSignIn->execute();
        $signInInfo = $reqSignIn->fetchAll();
    
    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }

    $goGuest = true;

    if(empty($signInInfo)){

        try {
            $sqlNoGoSignIn = "SELECT * FROM nogo_guest WHERE mail = '$mail'";
            $reqNoGoSignIn = $db->prepare($sqlNoGoSignIn);
            $reqNoGoSignIn->execute();
            $noGosignInInfo = $reqNoGoSignIn->fetchAll();
        
        } catch (PDOException $e) {
            $db = null;
            echo 'Erreur : '.$e->getMessage();
        }

        $goGuest = false;

        if(empty($noGosignInInfo)) {
            header('Location:../view/sign-in.php?error=noUser');
            exit();
        }

    }

    



    if ($signInInfo[0]['password'] != $_POST['pass'] && $noGosignInInfo[0]['pass'] != $_POST['pass']) {
        header('Location:../view/sign-in.php?error=passNoMatch');
        exit();
    }

    session_start();

    if($goGuest) {
        $_SESSION['id'] = $signInInfo[0]['id'];
        $_SESSION['surname'] = $signInInfo[0]['surname'];
        $_SESSION['name'] = $signInInfo[0]['name'];
        $_SESSION['mail'] = $signInInfo[0]['mail'];
        $_SESSION['tel'] = $signInInfo[0]['tel'];
        $_SESSION['pass'] = $signInInfo[0]['password'];
        $_SESSION['adress'] = $signInInfo[0]['adress'];
        $_SESSION['ville'] = $signInInfo[0]['ville'];
        $_SESSION['cp'] = $signInInfo[0]['cp'];
        $_SESSION['go'] = true;
    }
    else {
        $_SESSION['id'] = $noGosignInInfo[0]['id'];
        $_SESSION['surname'] = $noGosignInInfo[0]['surname'];
        $_SESSION['name'] = $noGosignInInfo[0]['name'];
        $_SESSION['mail'] = $noGosignInInfo[0]['mail'];
        $_SESSION['pass'] = $noGosignInInfo[0]['pass'];
        $_SESSION['go'] = false;
    }

    header('Location:../view/index.php?success=signIn&page=index');
    


    ?><pre><?php 
    // var_dump($_SESSION['surname']);
    // var_dump($_POST['pass']);
    var_dump($signInInfo);
    // var_dump(count($signInInfo));
    // var_dump($userPass);
    ?></pre><?php

}




?>