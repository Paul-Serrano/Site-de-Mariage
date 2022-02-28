<?php

session_start();

if (isset($_POST["log-out"])) {
    session_destroy();
    header('Location:../view/sign-in.php?page=signIn');
}

?>