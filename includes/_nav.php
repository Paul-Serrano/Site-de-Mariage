<?php

require "../includes/_head.php";



?>

<nav class="nav">
    <div class="nav-top">
    <img class="user-img nav-img" src="../public/img/menu burger.png" alt="menu burger">
        <?php
        if(isset($_SESSION['surname'])) {
        ?>
        <div class="user-block">
            <div class="log-out-block"></div>
            <form action="../includes/_log-out_post.php" method="POST">
            <button class="log-out" name="log-out"><p>Se déconnecter</p></button>
            </form>
        </div>
        <?php
        }
        ?>
        <img class="nav-img lantern-small" src="../public/img/lantern-small.png" alt="lanternes">
        <p>Lorem ipsum dolor sit amet.</p>
        <img class="nav-img lantern-small" src="../public/img/lantern-small.png" alt="lanternes">
        <button class="nav-btn"><img class="nav-img" src="../public/img/settings.png" alt="panneau de configuration"></button>
    </div>
    <div class="nav-bottom">
    <img class="nav-img lantern-large" src="../public/img/lantern-big.png" alt="lanternes">
    </div>
</nav>