<?php

require_once "../includes/_nav.php";

$alert = false;

if(isset($_GET['error'])) {
    if($_GET['error'] == 'noMailTo') {
        $alert = true;
        $type = 'warning';
        $message = "Veuillez choisir un destinataire s'il vous plait !";
    }

    if($_GET['error'] == 'noMessage') {
        $alert = true;
        $type = 'warning';
        $message = "Veuillez rentrer un message s'il vous plait !";
    }
}

?>

<body>
    <main class="contact-main">
        <form action="../controller/contact_post.php" method="POST" class="contact-form">
        <div class="mail-to-block">
            <div class='mail-to-topic-block'>
                <label class="mail-to-topic-label" for="mail-to-topic"><p>Sujet du message</p></label>
                <input class="mail-to-topic-input" name="mail-to-topic" id="mail-to-topic" type="text">
            </div>
            <input class="mail-to-input" id="mail-to-hugo" name="mail-to" type="radio" value="hugo" />
            <label for="mail-to-hugo" class="mail-to-label"><p>Mail pour Noémie et Hugo, les mariés</p></label>
            <input class="mail-to-input" id="mail-to-paul" name="mail-to" type="radio" value="paul" />
            <label for="mail-to-paul" class="mail-to-label"><p>Mail pour Paul Serrano, Développeur du site et témoin</p></label>
        </div>  
        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'><p>{$message}</p><div class='close-alert'><img src='../public/img/close.png' alt='fermer' onclick='closeAlert()'></div></div>" : ''; ?>  
            <textarea name="message" id="textarea" cols="30" rows="10"></textarea>
            <div class="contact-btn-container">
                <button class="contact-btn" type="submit" name="contact-submit"><p>Envoyer message</p></button>
            </div>
        </form>
    </main>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../public/contact.js"></script>
</body>