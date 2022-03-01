<?php

require_once "../controller/profile_post.php";
include_once "../includes/_nav.php";

?><pre><?php 
var_dump($getUserInfo);
?></pre><?php

?>

<body>
    <main class="profile-main">
        <div class="user-info-block">
            <div class="user-profile-picture-block">
                <img src="" alt="photo de profil">
            </div>
            <div class="user-profile-info-block">
                <div class="user-info-content">
                    <p><?php echo $getUserInfo['surname'];?></p>
                    <p><?php echo $getUserInfo['name'];?></p>
                </div>
                <div class="user-info-content">
                    <p><?php echo $getUserInfo['mail'];?></p>
                    <p><?php echo $getUserInfo['tel'];?></p>
                </div>
                <div class="user-info-content">
                    <p><?php echo $getUserInfo['adress'];?></p>
                </div>
                <div class="user-info-content">
                    <p><?php echo $getUserInfo['cp'];?></p>
                    <p><?php echo $getUserInfo['ville'];?></p>
                </div>
            </div>
            <div class="user-change-info-block">
                <button class="user-change-info-btn"><p>Changer Infos</p></button>
            </div>
        </div>
        <hr>
        <div class="user-photo-block"></div>
    </main>
    <script src="../public/script.js"></script>
</body>