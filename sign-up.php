<?php

include_once "_nav.php";
require "includes/_connect.php";

?>


<body>
    <main class="sign-up-main">
        <form action="sign-up_post.php" method="POST">
            <label for="name">Nom</label>
            <input id="name" type="text">
            <label for="surname">Prénom</label>
            <input id="Surname" type="text">
            <label for="mail">Mail</label>
            <input id="mail" type="text">
            <label for="tel">Téléphone</label>
            <input id="tel" type="text">
            <label for="adress">Adresse</label>
            <input id="adress" type="text">
            <label for="pass">Mot de passe</label>
            <input id="pass" type="text">
            <label for="pass2">répétez mot de passe</label>
            <input id="pass2" type="text">
            <div class="housing-form">
                <p>Avez vous déjà prévu votre logement pour l'évènement ?</p>
                <input id="housing-yes" type="radio" name="housing" value="yes">
                <label for="housing-yes">Oui</label>
                <input id="housing-no" type="radio" name="housing" value="no">
                <label for="housing-no">Non</label> 
            </div>
            <div class="food-form">
                <p>Avez vous des allergies ou un régime alimentaire particulier ?</p>
                <input id="food-yes" type="radio" name="food" value="yes">
                <label for="food-yes">Oui</label>
                <input id="food-no" type="radio" name="food" value="no">
                <label for="food-no">Non</label>
                <div class="food-issue"></div> 
            </div>
            <div class="sideGuest-form">
                <p>Venez vous avec une ou plusieurs personnes ne pouvant pas s'inscrire sur le site ?</p>
                <input id="sideGuest-yes" type="radio" name="sideGuest" value="yes">
                <label for="sideGuest-yes">Oui</label>
                <input id="sideGuest-no" type="radio" name="sideGuest" value="no">
                <label for="sideGuest-no">Non</label>
            </div>
        </form>
    </main>
    <script src="script.js"></script>
</body>
