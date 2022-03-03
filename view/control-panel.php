<?php

include_once "../includes/_nav.php";
require_once "../controller/control-panel_post.php"

?><pre><?php 
// var_dump($_SESSION['surname']);
// var_dump($_POST['pass']);
// var_dump($getUsers);
// var_dump(count($signInInfo));
// var_dump($userPass);
?></pre><?php

?>

<body>
    <main class="control-panel-main">
        <div class="control-panel-search-container">
            <div class="control-panel-searchbar-container">
                <form class="search-user-form" action="control-panel_post.php" method="GET">
                    <label for="search-user" class="search-user"><p>Recherche invité</p></label>
                    <input id="search-user" class="search-user-input" type="text">
                    <button class="search-user-btn" name="search-user-btn" type="submit">
                        <p>Lancer recherche</p>
                    </button>
                </form>
            </div>
            <hr>
            <div class="control-panel-tag-container">
                <button class="panel-tag"><p>Regime alimentaire spécifique</p></button>
                <button type="button" id="housing-tag" class="panel-tag" onclick="showNoHousing()"><p>N'ont pas encore prévu de logement</p></button>
                <button class="panel-tag"><p>Enfants</p></button>
                <button class="panel-tag"><p>Personnes agées</p></button>
                <button class="panel-tag"><p>Autre accompagnants</p></button>
                <button class="panel-tag"><p></p></button>
            </div>
        </div>
        <div class="control-panel-results">
        <?php
        for($i = 0; $i < count($getUsers); $i++) {
        ?>
        <div class='panel-user-block <?php echo $getUsers[$i]["name"]?> <?php echo $getUsers[$i]["surname"]?> <?php echo $getUsers[$i]["housing"]?>'>
            <div class="user-img-block"><img src="../public/img/user.png" alt=""></div>
            <div class="user-name-block">
                <p><?php echo $getUsers[$i]["name"];?></p>
                <p><?php echo $getUsers[$i]["surname"];?></p>
            </div>
            <div class="user-tag-block"></div>
        </div>
        <?php
        }
        ?>
        </div>
    </main>
    <script src="../public/script.js"></script>
</body>