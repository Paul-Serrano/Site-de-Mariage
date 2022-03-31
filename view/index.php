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
    <div class="planning-container">
        <div class="planning-block">
            <div class="planning-filter">
                <div class="planning-content">
                    <div class="planning">
                        <div class="planning-line">
                            <span>16h: Cérémonie civile</span>
                            <span>Mairie d'Arthez</span>
                        </div>
                        <div class="planning-line">
                            <span>16h45: Photo de groupe</span>
                            <span>Mairie d'Arthez</span>
                        </div>
                        <div class="planning-line">
                            <span>17h15: Mise en route</span>
                            <span>vers la salle des fêtes</span>
                        </div>
                        <div class="planning-line">
                            <span>17h30: Vin d'honneur</span>
                            <span>St Médard</span>
                        </div>
                        <div class="planning-line">
                            <span>20h30: Début du repas</span>
                            <span>St Médard</span>
                        </div>
                        <div class="planning-line">
                            <span>23h30: Soirée dansante</span>
                            <span>St Médard</span>
                        </div>
                    </div>
                    <hr>
                    <p>Informations complémentaires :</p>
                    <p>Thème vestimentaire : Guinguette / Bal Populaire</p>
                </div>
            </div>
            <img class="planning-bckg" src="../public/img/portrait.png" alt="building">
        </div>
    </div>
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