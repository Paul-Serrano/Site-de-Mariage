<?php

require_once "../includes/_head.php";
require_once "../includes/_loader.php"



?>

<nav class="nav">
    <div class="nav-top">
        <?php
        if(isset($_SESSION['surname'])) {
        ?>
        <div class="nav-link">
            <div class="user-block">
                <div class="log-out-block">
                    <form class="log-out-form" action="../includes/_log-out_post.php" method="POST">
                        <button class="log-out" name="log-out"><p>Se déconnecter</p></button>
                    </form>
                </div>
                <div class="sign-in-block">
                    <a class="nav-link" href="../view/user-profile.php">
                        <button class="nav-btn profile-btn">
                            <p>Votre profil</p>
                        </button>
                    </a>
                </div>   
            </div>
        </div>
        <?php
        }
        else {
        ?>
        <a href="../view/sign-in.php" class="nav-link">
            <button class="nav-btn">
                <img src="../public/img/connect.png" alt="connectez vous">
            </button>
        </a>
        <?php
        }
        ?>
        <img class="nav-img lantern-small" src="../public/img/lantern-small.png" alt="lanternes">
        <p>Lorem ipsum dolor sit amet.</p>
        <img class="nav-img lantern-small" src="../public/img/lantern-small.png" alt="lanternes">
        <a href="../view/control-panel.php" class="nav-link">
            <button class="nav-btn">
                <img class="nav-img" src="../public/img/settings.png" alt="panneau de configuration">
            </button>
        </a>
    </div>
    <div class="nav-bottom">
    <img class="nav-img lantern-large" src="../public/img/lantern-big.png" alt="lanternes">
    </div>
</nav>