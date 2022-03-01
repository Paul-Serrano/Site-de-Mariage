<?php

require_once "../controller/profile_post.php";
include_once "../includes/_nav.php";


?>

<body>
    <main class="profile-main">
        <div class="user-info-block">
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
        <hr>
        <div class="user-photo-block"><p>Les photos du mariage seront disponibles peu après la cérémonie, un peu de patience !</p></div>
    </main>
    <script src="../public/script.js"></script>
</body>