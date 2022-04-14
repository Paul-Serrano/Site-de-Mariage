<?php

include_once "../includes/_nav.php";

if(isset($_SESSION['mail'])){
    header('Location:../view/index.php?page=index');
}

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;

    if ($_GET['error'] == "missingMail") {
        $type = "warning";
        $message = "Adresse mail non renseignée";
    }

    if ($_GET['error'] == "missingPass") {
        $type = "warning";
        $message = "Mot de passe non renseigné";
    }

    if ($_GET['error'] == "noUser") {
        $type = "warning";
        $message = "Adresse Mail non identifiée";
    }

    if ($_GET['error'] == "passNoMatch") {
        $type = "warning";
        $message = "Le mot de passe ne correspond pas";
    }
}


?>

<body>
    <main class="sign-in-main">
    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'><p>{$message}</p><div class='close-alert'><img src='../public/img/close.png' alt='fermer' onclick='closeAlert()'></div></div>" : ''; ?>
        <form action="../controller/sign-in_post.php" method="POST" class="sign-in-form">
            <label for="mail" class="sign-in-label"><p>Adresse mail</p></label>
            <input class="sign-in-input" id="mail" type="text" name="mail">
            <label for="pass" class="sign-in-label"><p>Mot de passe</p></label>
            <input class="sign-in-input" id="pass" type="password" name="pass">
            <div class="alert-container">
            <div class="submit-container">
                <div class="sign-in-link-container">
                        <a href="../view/sign-up.php?page=signUp" class="sign-up-link"><p>Vous n'avez pas de compte ? c'est par ici !</p></a>
                    </div>
                    <div class="sign-in-submit-container">
                        <button type="submit" name="sign-in-submit" class="sign-in-btn"><p>Se connecter</p></button>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script src="../public/script.js"></script>
</body>







