<?php

require_once "../includes/_nav.php";


?>

<body>
    <main class="contact-main">
        <form action="../controller/contact_post.php" method="POST" class="contact-form">
            <textarea name="message" id="textarea" cols="30" rows="10"></textarea>
            <div class="contact-btn-container">
                <button class="contact-btn" type="submit" name="contact-submit"><p>Envoyer message</p></button>
            </div>
        </form>
    </main>
    <script src="../ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector("#textarea")).catch((error) => {
  console.error(error);
});
    </script>
</body>