<?php

require_once "../includes/_head.php";
require_once "../includes/_loader.php";

$close = true;

$title = "Bienvenue, si vous êtes un invité du mariage d'Hugo et Noémie, veuillez vous identifier svp !";

$closeChoice = $title;

if(isset($_GET['success'])) {
    $close = false;
    if($_GET['success'] == 'signIn') {
        $title = "Bienvenu sur le site de Noémie et Hugo !";
    }
    if($_GET['success'] == 'signUp') {
        $title = "Bienvenu sur le site de Noémie et Hugo !";
    }
}

if(isset($_GET['error'])) {
    $close = false;
    if($_GET['error'] == 'knownMail') {
        $title = "Formulaire d'inscrpition";
    }
    if($_GET['error'] == 'missingInput') {
        $title = "Formulaire d'inscrpition";
    }
    if($_GET['error'] == 'differentPasswords') {
        $title = "Formulaire d'inscrpition";
    }
    if($_GET['error'] == 'differentPasswords') {
        $title = "Formulaire d'inscrpition";
    }
    if ($_GET['error'] == "missingMail") {
        $title = "Formulaire de connexion";
    }

    if ($_GET['error'] == "missingPass") {
        $title = "Formulaire de connexion";
    }

    if ($_GET['error'] == "noUser") {
        $title = "Formulaire de connexion";
    }

    if ($_GET['error'] == "passNoMatch") {
        $title = "Formulaire de connexion";
    }
}

if(isset($_GET['page'])) {
    if($_GET['page'] == 'signIn' || $_GET['page'] == 'index' || $_GET['page'] == 'signUp') {
        $close = false;
    }
    if($_GET['page'] == 'index') {
        $title = "Bienvenu sur le site de Noémie et Hugo !";
    }
    if($_GET['page'] == 'signIn') {
        $title = "Bienvenu sur le site de Noémie et Hugo !";
    }
    if($_GET['page'] == 'signUp') {
        $title = "Formulaire d'inscription";
    }
    if($_GET['page'] == 'signIn') {
        $title = "Formulaire de connexion";
    }
    if($_GET['page'] == 'contact') {
        $title = "Contact";
    }
    if($_GET['page'] == 'portfolio') {
        $title = "Porfolio";
    }
    if($_GET['page'] == 'map') {
        $title = "Itinéraires et cartes";
    }
    if($_GET['page'] == 'info') {
        $title = "informations pratiques";
    }
    if($_GET['page'] == 'leetchi') {
        $title = "Cagnotte Leetchi";
    }
    if($_GET['page'] == 'panel') {
        $title = "Big Brother";
    }
}

if($title == $closeChoice) {
    $close = false;
}

    
    


?>

<nav class="nav">
        <?php
        if(isset($_SESSION['surname'])) {
        ?>
        <div class="user-block">
                <div class="log-out-block">
                    <form class="log-out-form" action="../includes/_log-out_post.php" method="POST">
                        <button class="log-out" name="log-out"><p>Se déconnecter</p></button>
                    </form>
                </div>
                <div class="sign-in-block">
                    <a class="nav-link" href="../view/user-profile.php?page=profile">
                        <button class="nav-btn profile-btn">
                            <p>Votre profil</p>
                        </button>
                    </a>
                </div>   
            </div>
        <?php
        }
        else {
        ?>
        <a href="../view/sign-in.php?page=signIn" class="nav-link" style="align-self:flex-start;">
            <button class="nav-btn">
                <img src="../public/img/connect.png" alt="connectez vous">
            </button>
        </a>
        <?php
        }
        ?>
        <img class="nav-img lantern-small" src="../public/img/lantern-small.png" alt="lanternes">
        <div class="title-block">
        <p><?php echo $title;?></p>
        <img class="nav-img lantern-large" src="../public/img/lantern-large.png" alt="lanternes">
        </div>
        <img class="nav-img lantern-small" src="../public/img/lantern-small.png" alt="lanternes">
        <div class="close-block">
            <?php
            if($close) {
            ?>
            <a href="../view/index.php?page=index" class="nav-link nav-link-right">
                <button class="nav-btn">
                    <img class="nav-img" src="../public/img/close.png" alt="panneau de configuration">
                </button>
            </a>
            <?php
            }
            ?>
            <a href="../view/control-panel.php?page=panel" class="nav-link nav-link-right">
                <button class="nav-btn">
                    <img class="nav-img" src="../public/img/settings.png" alt="panneau de configuration">
                </button>
            </a>
        </div>
</nav>