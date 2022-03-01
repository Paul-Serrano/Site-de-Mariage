<?php

require_once "../includes/_nav.php";

?>

<body>
    <main class="change-info-main">
        <p>Remplissez les éléments que vous souhaitez modifier, entrez votre mot de passe et validez !</p>
        <form class="change-form" action="change-info_post.php" mathod="POST">
            <div class="change-form-content">
                <div class="change-input-block">
                    <label for="mail" class="change-label"><p>Adresse mail</p></label>
                    <input class="change-input" id="mail" type="text" name="mail">
                </div>
                <div class="change-input-block">
                    <label for="tel" class="change-label"><p>Téléphone</p></label>
                    <input class="change-input" id="tel" type="text" name="tel">
                </div>
                <div class="change-input-block">
                    <label for="adress" class="change-label"><p>Adresse Postale</p></label>
                    <input class="change-input" id="adress" type="text" name="adress">
                </div>
                <div class="change-input-block">
                    <label for="cp" class="change-label"><p>Code Postal</p></label>
                    <input class="change-input" id="cp" type="text" name="cp">
                </div>
                <div class="change-input-block">
                    <label for="ville" class="change-label"><p>Code Postal</p></label>
                    <input class="change-input" id="ville" type="text" name="ville">
                </div>
                <div class="change-input-block">
                    <label for="newpass" class="change-label"><p>Nouveau mot de passe</p></label>
                    <input class="change-input" id="newpass" type="text" name="newpass">
                </div>
            </div>
            <div class="change-validation-block">
                <label for="pass" class="change-label"><p>Mot de passe actuel, pour validation</p></label>
                <input class="change-input" id="pass" type="text" name="pass">
                <button class='change-info-btn' name="change-info-btn"><p>Valider Changements</p></button>
            </div>
        </form>
    </main>
    <script src="../public/script.js"></script>
</body>