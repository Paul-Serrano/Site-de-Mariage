<?php

include_once "../includes/_nav.php";

$alert = false;

if (isset($_GET['success'])) {
    if($_GET['success'] == 'sendMail') {
        $alert = true;
    $type = "success";
    $message = "Votre message a bien été envoyé, nous vous répondrons dans les meilleurs délais !";
    }

    if($_GET['success'] == 'signUp') {
        $alert = true;
    $type = "success";
    $message = "Bonjour ".$_SESSION["surname"]." Vous êtes bien connecté ! ";
    }

    if($_GET['success'] == 'signIn') {
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
        <div class="index-top-container">
            <a class="index-block-link" href="../view/contact.php">
                <div class="index-block">
                    <div class="index-block-title"><p>Itinéraire évènements / logements</p></div>
                    <div class="index-block-content"></div>
                </div>
            </a>
            <a class="index-block-link" href="../view/contact.php">
                <div class="index-block">
                    <div class="index-block-title"><p>Contact</p></div>
                    <div class="index-block-content"><img src="../public/img/contact.png" alt="icone de contact"></div>
                </div>
            </a>
            <a class="index-block-link" href="../view/contact.php">
                <div class="index-block">
                    <div class="index-block-title"><p>Inforamtions Pratiques</p></div>
                    <div class="index-block-content"><p>Retrouvez ici toutes les informations relatives au mariage d'Hugo et Noémie !</p></div>
                </div>
            </a>
        </div>
        <div class="index-low-container">
            <a class="index-block-link" href="../view/contact.php">
                <div class="index-block">
                    <div class="index-block-title"><p>Cagnotte leetchi</p></div>
                    <div class="index-block-content"><img src="../public/img/cagnotte-leetchi.png" alt="icone de cagnotte leetchi"></div>
                </div>
            </a>
            <a class="index-block-link" href="../view/contact.php">
                <div class="index-block porfolio-block">
                    <div class="not-availaible"><p>Bientôt Disponible !</p></div>
                    <div class="index-block-title"><p>Portfolio</p></div>
                    <div class="index-block-content"></div>
                </div>
            </a>
        </div>
    </div>
</main>
<script src="../public/script.js"></script>
</body>