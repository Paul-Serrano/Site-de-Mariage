<?php

require_once "../controller/profile_post.php";
include_once "../includes/_nav.php";

if(isset($_GET['id'])){

    $id = intval($_GET['id']);
    $getUserSideGuest = [];
    $food = [];
    $sideGuestFood = [];
    $userSideGuest = [];
    $sideGuestFoodEmpty = [];
    $sideGuestFoodIndiv = [];

    for($i = 0; $i < count($getAllUsers); $i++) {
        if($getAllUsers[$i]['id'] == $id) {
            $userName = $getAllUsers[$i]['surname']." ".$getAllUsers[$i]['name'];
            $getUserInfo['mail'] = $getAllUsers[$i]['mail'];
            $getUserInfo['tel'] = $getAllUsers[$i]['tel'];
            $getUserInfo['adress'] = $getAllUsers[$i]['adress'];
            $userCpVille = $getAllUsers[$i]['cp']." ".$getAllUsers[$i]['ville'];
        }
    }

    for($i = 0; $i < count($getAllFood); $i++) {
        if($getAllFood[$i]['id'] == $id) {
            for($j = 0; $j < 6; $j++) {
                if(!empty($getAllFood[$i]['type'.$j.''])) {
                    array_push($food, $getAllFood[$i]['type'.$j.'']);
                }
            }
        }
    }

    for($i = 0; $i < count($getAllSideGuest); $i++) {
        if($getAllSideGuest[$i]['id'] == $id) {
           array_push($getUserSideGuest, $getAllSideGuest[$i]);
        }
    }

    for($i = 0; $i < count($getUserSideGuest); $i++) {
        for($j = 0; $j < count($getAllFood); $j++) {
            if($getUserSideGuest[$i]['sideGuest_id'] == $getAllFood[$j]['sideGuest_id']) {
               array_push($sideGuestFoodEmpty, $getAllFood[$j]); 
            }
        }
    }

    for($i = 0; $i < count($sideGuestFoodEmpty); $i++){
        for($j = 0; $j < 6; $j++) {
            if(!empty($sideGuestFoodEmpty[$i]['type'.$j.''])){
                array_push($sideGuestFoodIndiv, $sideGuestFoodEmpty[$i]['type'.$j.'']);
            }
        }
        array_push($sideGuestFood, $sideGuestFoodIndiv);
        $sideGuestFoodIndiv = [];
    }


}


?><pre><?php
// var_dump($sideGuestFood);
// var_dump($sideGuestFoodEmpty);
// var_dump($getUserSideGuest);
// var_dump($getAllFood);
// var_dump($userSideGuest);
?></pre><?php



?>

<body>
    <main class="profile-main">
        <div class="user-info-container">
            <div class="user-selfinfo-block user-info-block">
                <div class="profile-choice">
                    <button class="switch-profile-btn" onclick="switchProfileInfo(0, 1)"><p class="profile-btn-txt">Alimentation</p></button>
                    <button class="switch-profile-btn" onclick="switchProfileInfo(2, 1)"><p class="profile-btn-txt">Accompagnants</p></button>
                </div>
                <div class="user-profile-picture-block">
                    <img src="../public/img/user.png" alt="photo de profil">
                </div>
                <div class="user-profile-info-block">
                    <div class="user-info-content">
                        <p><?php echo $userName;?></p>
                    </div>
                    <div class="user-info-content">
                        <p><?php echo $getUserInfo['mail'];?></p>
                    </div>
                    <div class="user-info-content">
                        <p><?php echo $getUserInfo['tel'];?></p>
                    </div>
                    <div class="user-info-content">
                        <p><?php echo $getUserInfo['adress'];?></p>
                    </div>
                    <div class="user-info-content">
                        <p><?php echo $userCpVille;?>
                    </div>
                </div>
                <a href="../view/change-info.php?page=changeInfo" class="user-change-info-block">
                    <button class="user-change-info-btn"><p>Changer Infos</p></button>
                </a>
            </div>
            <div class="user-info-block user-food-block">
                <div class="profile-choice">
                    <button class="switch-profile-btn" onclick="switchProfileInfo(1, 0)"><p class="profile-btn-txt">Infos Persos</p></button>
                    <button class="switch-profile-btn" onclick="switchProfileInfo(2, 0)"><p class="profile-btn-txt">Accompagnants</p></button>
                </div>
                <div class="user-profile-picture-block">
                    <img src="../public/img/user.png" alt="photo de profil">
                </div>
                <div class="user-profile-info-block">
                    <?php
                    if(empty($food)) {
                    ?>
                    <p>Pas de régime alimentaire particulier</p>
                    <?php
                    }
                    else {
                        for($i = 0; $i < count($food); $i++){
                        ?>
                        <div class="user-info-content user-food-content">
                            <div class="user-food">
                                <img class="food-icon" src="../public/img/noFood.png" alt="icône de cuisse de poulet">
                                <p><?php echo $food[$i];?></p>
                            </div>
                        </div>
                    <?php 
                        }
                    }
                    ?>
                </div>
                <!-- <a href="../view/change-alim.php?page=changealim" class="user-change-info-block">
                    <button class="user-change-info-btn"><p>Changer Alimentation</p></button>
                </a> -->
            </div>
            <div class="user-info-block user-sideguest-block">
                <div class="profile-choice">
                    <button class="switch-profile-btn" onclick="switchProfileInfo(1, 2)"><p class="profile-btn-txt">Infos Persos</p></button>
                    <button class="switch-profile-btn" onclick="switchProfileInfo(0, 2)"><p class="profile-btn-txt">Alimentation</p></button>
                </div>
                <div class="user-profile-picture-block">
                    <img src="../public/img/user.png" alt="photo de profil">
                </div>
                <?php
                if(empty($getUserSideGuest)) {
                ?>
                <p>Pas d'accompagnant sans compte</p>
                <?php
                }
                else {
                    for($i = 0; $i < count($getUserSideGuest); $i++) {
                    ?>
                    <div class="user-profile-info-block sideguest-info-block">
                        <div class="sideguest-name-age-block">
                            <div class="sideguest-name-surname-block">
                                <div class="sideguest-info-content">
                                    <p><?php echo $getUserSideGuest[$i]['surname'];?></p>
                                </div>
                                <p> </p>
                                <div class="sideguest-info-content">
                                    <p><?php echo $getUserSideGuest[$i]['name'];?></p>
                                </div>
                            </div>
                            <div class="sideguest-info-content">
                                <p><?php echo $getUserSideGuest[$i]['age'];?> ans</p>
                            </div>
                        </div>
                        <div class="sideguest-food-content">
                            <?php
                            if(!empty($sideGuestFood)) {
                                for($j = 0; $j < count($sideGuestFood[$i]); $j++) {
                                    ?>
                                    <div class="sideguest-indiv-food-content">
                                        <img class="sideguest-food-img" src="../public/img/noFood.png" alt="photo de profil">
                                        <p><?php echo $sideGuestFood[$i][$j];?></p>
                                    </div>
                                    <?php
                                }

                            }
                            ?>
                        </div>
                    </div>
                    <?php
                        }
                    }
                ?>
                <!-- <a href="../view/change-info.php?page=changeInfo" class="user-change-info-block">
                    <button class="user-change-info-btn"><p>Changer Infos</p></button>
                </a> -->
            </div>
        </div>
        <hr>
        <div class="user-photo-block"><p>Les photos du mariage seront disponibles peu après la cérémonie, un peu de patience !</p></div>
    </main>
    <script src="../public/script.js"></script>
</body>