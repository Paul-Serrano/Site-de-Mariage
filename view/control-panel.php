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
                <form class="search-user-form" action="../controller/control-panel_post.php" method="POST">
                    <label for="search-user" class="search-user"><p>Recherche invité</p></label>
                    <input id="search-user" class="search-user-input" type="text" name="search-user">
                    <button class="search-user-btn" name="search-user-btn" type="button" onclick="searchUser()">
                        <p>Lancer recherche</p>
                    </button>
                    <div class="reset-searchbar-block">
                    <button type="submit" name="reset-searchbar" class="reset-searchbar-btn"><p>Réinitialiser</p></button>
                </div>
                </form>
            </div>
            <hr>
            <div class="control-panel-tag-container">
            <div class="panel-tag">
                    <div class="panel-tag-title">
                        <p>Alimentation</p>
                    </div>
                    <div class="search-choice">
                        <button type="button" class="panel-btn-tag no-tag" onclick="showNoFood()"><p>Particularités</p></button>
                        <button type="button" class="panel-btn-tag yes-tag" onclick="showYesFood()"><p>Pas de contraintes</p></button>
                    </div>
                </div>
                <div class="panel-tag">
                    <div class="panel-tag-title">
                        <p>Logement</p>
                    </div>
                    <div class="search-choice">
                        <button type="button" class="panel-btn-tag no-tag" onclick="showNoHousing()"><p>Non Prévu</p></button>
                        <button type="button" class="panel-btn-tag yes-tag" onclick="showYesHousing()"><p>Prévu</p></button>
                    </div>
                </div>
                <div class="panel-tag">
                    <div class="panel-tag-title">
                        <p>Accompagnants</p>
                    </div>
                    <div class="search-choice">
                        <button type="button" class="panel-btn-tag sideguest-tag" onclick="showChild()"><p>Enfants</p></button>
                        <button type="button" class="panel-btn-tag sideguest-tag" onclick="showAdult()"><p>Adultes</p></button>
                        <button type="button" class="panel-btn-tag sideguest-tag" onclick="showOld()"><p>Personne agée</p></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-panel-results">
        <?php
        for($i = 0; $i < count($getUsers); $i++) {
            if(in_array($getUsers[$i]['id'], $getUserFood)) {
            ?>
            <div class='<?php if(in_array($getUsers[$i]['id'], $getUserChild)) {echo "child ";} if (in_array($getUsers[$i]['id'], $getUserSide)) {echo "adult ";} if (in_array($getUsers[$i]['id'], $getUserOld)) {echo "old ";}?>panel-user-block food <?php echo $getUsers[$i]["name"];?> <?php echo $getUsers[$i]["surname"];?> <?php echo $getUsers[$i]["housing"];?>'>
            <?php
            }
            else {
            ?>
            <div class='<?php if(in_array($getUsers[$i]['id'], $getUserChild)) {echo "child ";} if (in_array($getUsers[$i]['id'], $getUserSide)) {echo "adult ";} if (in_array($getUsers[$i]['id'], $getUserOld)) {echo "old ";}?>panel-user-block no-food <?php echo $getUsers[$i]["name"];?> <?php echo $getUsers[$i]["surname"];?> <?php echo $getUsers[$i]["housing"];?>'>
            <?php
            }
            ?>
                <div class="user-img-block"><img src="../public/img/user.png" alt=""></div>
                <div class="user-name-block">
                    <p class="user-name"><?php echo $getUsers[$i]["name"];?></p>
                    <p class="user-surname"><?php echo $getUsers[$i]["surname"];?></p>
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