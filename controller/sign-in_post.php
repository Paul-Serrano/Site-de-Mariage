<?php

require_once "../includes/_connect.php";

if(isset($_POST['sign-in-submit'])){

    
    if(empty($_POST['mail'])) {
        header('Location:../view/sign-in.php?error=missingMail?page=signIn');
        exit();
    }

    if(empty($_POST['pass'])) {
        header('Location:../view/sign-in.php?error=missingPass?page=signIn');
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

    if(empty($signInInfo)){
        header('Location:../view/sign-in.php?error=noUser?page=signIn');
        exit();
    }

    



    if ($signInInfo[0]['password'] != $_POST['pass']) {
        header('Location:../view/sign-in.php?error=passNoMatch?page=signIn');
        exit();
    }

    session_start();



    $_SESSION['surname'] = $signInInfo[0]['surname'];
    $_SESSION['name'] = $signInInfo[0]['name'];
    $_SESSION['mail'] = $signInInfo[0]['mail'];
    $_SESSION['tel'] = $signInInfo[0]['tel'];

    header('Location:../view/index.php?success=signIn');
    


    ?><pre><?php 
    // var_dump($_SESSION['surname']);
    // var_dump($_POST['pass']);
    var_dump($signInInfo);
    // var_dump(count($signInInfo));
    // var_dump($userPass);
    ?></pre><?php

}




?>