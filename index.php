<?php

include_once "../includes/_nav.php";

$alert = false;

if (isset($_GET['success'])) {
    if($_GET['success'] == 'sendMail') {
        $alert = true;
        $type = "success";
        $message = "Votre message a bien été envoyé, nous vous répondrons dans les meilleurs délais !";
    }

    if($_GET['success'] == "changeInfo") {
        $alert = true;
        $type= "success";
        $message="Vos données ont bien été modiiée !";
    }

    if($_GET['success'] == 'signUp') {
        $alert = true;
        $type = "success";
        $message = "Bonjour ".$_SESSION["surname"]." Vous êtes bien connecté ! ";
    }

    if($_GET['success'] == 'signInIndex') {
        $alert = true;
        $type = "success";
        $message = "Bonjour ".$_SESSION["surname"]." Vous êtes bien connecté ! ";
    }
}

?>

<body>
<main class="index-main">
<?php echo $alert ? "<div class='alert alert-{$type} mt-2'><p>{$message}</p><div><img src='../public/img/close.png' alt='fermer' onclick='closeAlert()'></div></div>" : ''; ?>
    <div class="index-container">
            <a class="index-block-link" href="../view/map.php?page=map">
                <div class="index-block">
                    <div class="index-block-title"><p>Itinéraire / Logements</p></div>
                    <div class="index-block-content"><img src="../public/img/map.png" alt="carte"></div>
                </div>
            </a>
            <a class="index-block-link" href="../view/contact.php?page=contact">
                <div class="index-block">
                    <div class="index-block-title"><p>Contact</p></div>
                    <div class="index-block-content"><img src="../public/img/contact.png" alt="contact"></div>
                </div>
            </a>
            <a class="index-block-link" href="../view/info.php?page=info">
                <div class="index-block">
                    <div class="index-block-title"><p>Inforamtions Pratiques</p></div>
                    <div class="index-block-content"><img src="../public/img/info.png" alt="info"></div>
                </div>
            </a>
            <a class="index-block-link" href="../view/leetchi.php?page=leetchi">
                <div class="index-block">
                    <div class="index-block-title"><p>Cagnotte leetchi</p></div>
                    <div class="index-block-content"><img src="../public/img/cagnotte-leetchi.png" alt="cagnotte leetchi"></div>
                </div>
            </a>
            <a class="index-block-link" href="#">
                <div class="index-block porfolio-block">
                    <div class="not-availaible"><p>Bientôt Disponible !</p></div>
                    <div class="index-block-title"><p>Portfolio</p></div>
                    <div class="index-block-content"><img src="../public/img/photo.png" alt="photo"></div>
                </div>
            </a>
    </div>
</main>
<script src="../public/script.js"></script>
<script src="../public/open-menu-burger.js"></script>
</body>