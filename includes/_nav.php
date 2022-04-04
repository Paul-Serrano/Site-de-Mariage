<?php

require_once "../includes/_head.php";
require_once "../includes/_loader.php";

$close = true;

$title = "Bienvenu sur le site de Noémie et Hugo !";

if(isset($_SESSION['mail'])) {
    $title = "Bonjour ".$_SESSION["surname"]." ! Vous allez bien ?";
}

$closeChoice = $title;

$homeConnect = "connect";
$homeConnect1 = "sign-in";
$homeConnect3 = "signIn";

if(isset($_GET['success'])) {
    $close = false;
    if($_GET['success'] == 'signIn') {
        $title = "Bienvenu sur le site de Noémie et Hugo !";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }
    if($_GET['success'] == 'signUp') {
        $title = "Bienvenu sur le site de Noémie et Hugo !";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }
}

if(isset($_GET['error'])) {
    $close = false;
    if($_GET['error'] == 'knownMail') {
        $title = "Formulaire d'inscrpition";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }
    if($_GET['error'] == 'missingInput') {
        $title = "Formulaire d'inscrpition";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }
    if($_GET['error'] == 'differentPasswords') {
        $title = "Formulaire d'inscrpition";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }
    if($_GET['error'] == 'differentPasswords') {
        $title = "Formulaire d'inscrpition";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }
    if ($_GET['error'] == "missingMail") {
        $title = "Formulaire de connexion";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }

    if ($_GET['error'] == "missingPass") {
        $title = "Formulaire de connexion";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }

    if ($_GET['error'] == "noUser") {
        $title = "Formulaire de connexion";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
    }

    if ($_GET['error'] == "passNoMatch") {
        $title = "Formulaire de connexion";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "";
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
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "index";
    }
    if($_GET['page'] == 'signUp') {
        $title = "Formulaire d'inscription";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "index";
    }
    if($_GET['page'] == 'signIn') {
        $title = "Formulaire de connexion";
        $homeConnect = "home";
        $homeConnect1 = "index";
        $homeConnect3 = "index";
    }
    if($_GET['page'] == 'contact') {
        $title = "Formulaire de Contact";
    }
    if($_GET['page'] == 'portfolio') {
        $title = "Porfolio";
    }
    if($_GET['page'] == 'map') {
        $title = "Itinéraires et cartes";
    }
    if($_GET['page'] == 'info') {
        $title = "Informations pratiques";
    }
    if($_GET['page'] == 'changeInfo') {
        $title = "Changement d'informations";
    }
    if($_GET['page'] == 'leetchi') {
        $title = "Cagnotte Leetchi";
    }
    if($_GET['page'] == 'panel') {
        $title = "Big Brother";
    }
    if($_GET['page'] == 'profile') {
        $title = "Bienvenu sur votre page de  profil ".$_SESSION['surname']."";
    }
}

if($title == $closeChoice) {
    $close = false;
}  

$panel = false;

if(isset($_SESSION['mail'])) {
    if($_SESSION['mail'] == "paul.serrano08374@gmail.com" || $_SESSION['mail'] == "hugolecourtois@hotmail.fr" || $_SESSION['mail'] == "lienhard.noemie@orange.fr") {
        $panel = true;
    }
}

if(isset($_GET['id'])){
    $title = "Page de profil n° ".$_GET['id']."";
}



?>


<nav class="nav">
<img class="nav-bckg desktop-nav-bckg" src="../public/img/banniere2.png" alt="banniere">
        <?php
        if(isset($_SESSION['surname'])) {
        ?>
        <div class="user-block">
            <button type="button" class="menu-burger-btn" onclick="openMenuBurger()">
                <img class="nav-img menu-img" src="../public/img/menu-burger.png" alt="menu">
            </button>
            <div class="menu-burger">
                    <div class="sign-in-block">
                        <a class="nav-link" href="../view/profile.php?page=profile">
                            <button class="nav-btn profile-btn">
                                <p>Votre profil</p>
                            </button>
                        </a>
                    </div>
                    <div class="log-out-block">
                        <form class="log-out-form" action="../includes/_log-out_post.php" method="POST">
                            <button class="log-out" name="log-out"><p>Se déconnecter</p></button>
                        </form>
                    </div>
                    <?php 
                    if(isset($_SESSION['mail'])) {
                        if(($_SESSION['mail'] == "paul.serrano08374@gmail.com" || $_SESSION['mail'] == "hugolecourtois@hotmail.fr" || $_SESSION['mail'] == "liehnard.noemie@orange.fr") && $title != "Big Brother") {
                    ?>
                        <a href="../view/control-panel.php?page=panel" class="nav-link nav-link-right">
                            <button class="nav-btn">
                                <img class="nav-img" src="../public/img/settings.png" alt="panneau de configuration">
                            </button>
                        </a>
                    <?php
                        }
                    }   
                    ?>
                </div>
            </div>
        <?php
        }
        else if(($_GET['page'] != "signIn") && ($_GET['page'] != "signUp")) {
        ?>
        <div class="home-connect-block">
        <a href="../view/<?php echo $homeConnect1;?>.php?page=<?php echo $homeConnect3;?>" class="nav-link connect-nav-link">
            <div class="sign-in-redirection">
                <p>Connectez vous pour pouvoir poster et visionner les photos du mariage !</p>
            </div>
        </a>
        </div>
        <?php
        }
        else {
        ?>
            <a href="../view/index.php?page=index" class="nav-link home-nav-link">
               <img src="../public/img/home.png" alt="home">
            </a>
        <?php
        }
        ?>
        <div class="title-block">
        <p><?php echo $title;?></p>
        </div>
        <?php
            if($close) {
        ?>
        <div class="close-block">
            <a href="../view/index.php?page=index" class="nav-link nav-link-right">
                <button class="nav-btn">
                    <img class="nav-img" src="../public/img/close.png" alt="panneau de configuration">
                </button>
            </a>
            <?php
            }
            ?>
        </div>
</nav>

<nav class="nav-phone">
<img class="nav-bckg" src="../public/img/banniere2.png" alt="banniere">
    <div class="nav-phone-container">
        <div class="nav-left">
        <?php
            if(isset($_SESSION['surname'])) {
            ?>
            <div class="user-block">
            <button type="button" class="menu-burger-btn" onclick="openMenuBurger()">
                <img src="../public/img/menu-burger.png" alt="menu">
            </button>
                <div class="menu-burger">
                    <div class="sign-in-block">
                        <a class="nav-link" href="../view/profile.php?page=profile">
                            <button class="nav-btn profile-btn">
                                <p>Votre profil</p>
                            </button>
                        </a>
                    </div>
                    <div class="log-out-block">
                        <form class="log-out-form" action="../includes/_log-out_post.php" method="POST">
                            <button class="log-out" name="log-out"><p>Se déconnecter</p></button>
                        </form>
                    </div>
                    <?php 
                    if(isset($_SESSION['mail'])) {
                        if(($_SESSION['mail'] == "paul.serrano08374@gmail.com" || $_SESSION['mail'] == "hugolecourtois@hotmail.fr" || $_SESSION['mail'] == "liehnard.noemie@orange.fr") && $title != "Big Brother") {
                    ?>
                        <a href="../view/control-panel.php?page=panel" class="nav-link nav-link-right">
                            <button class="nav-btn">
                                <img class="nav-img" src="../public/img/settings.png" alt="panneau de configuration">
                            </button>
                        </a>
                    <?php
                        }
                    }   
                    ?>
                </div>
            </div>
            <?php
            }
            else {
            ?>
            <div class="home-connect-block">
            <a href="../view/<?php echo $homeConnect1;?>.php?page=<?php echo $homeConnect3;?>" class="nav-link">
                <button class="nav-btn">
                    <img src="../public/img/<?php echo $homeConnect;?>.png" alt="connectez vous">
                </button>
            </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="nav-central">
            <div class="title-block">
                <p><?php echo $title;?></p>
            </div>
        </div>
        <?php
        if($close) {
        ?>
        <div class="close-block">
            <a href="../view/index.php?page=index" class="nav-link nav-link-right">
                <button class="nav-btn">
                    <img class="nav-img" src="../public/img/close.png" alt="panneau de configuration">
                </button>
            </a>
        <?php
        }
        ?>
        </div>
    </div>
</nav>