<?php

require_once "../includes/_nav.php";


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
            <textarea name="message" id="textarea" cols="30" rows="10"></textarea>
            <div class="contact-btn-container">
                <button class="contact-btn" type="submit" name="contact-submit"><p>Envoyer message</p></button>
            </div>
        </form>
    </main>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../public/script.js"></script>
</body>