<?php

include_once "_nav.php";
require "includes/_connect.php";

$regularForm = ["name", "surname", "mail", "tel", "adress", "pass", "pass2"];
$regularFormLabel = ["Nom", "Prénom", "Adresse Mail", "Téléphone", "Adresse Postale", "Mot de Passe", "Retapez mot de passe"];
$hypotheticForm = ["housing", "food", "sideGuest"];
$choice = ["yes", "no"];
$question = ["Avez vous déjà prévu votre logement pour l'évènement ?",
"Avez vous des allergies ou un régime alimentaire particulier ?",
"Venez vous avec une ou plusieurs personnes ne pouvant pas s'inscrire sur le site ?"
];
$form = [$regularForm, $hypotheticForm, $question, $regularFormLabel];
?>


<body>
    <main class="sign-up-main">
        <form class="sign-up-form" action="sign-up_post.php" method="POST">
            <div class="regular-form">
                <?php
                for($i = 0; $i < count($form[0]); $i++) {
                ?>
                <div class="<?php echo $form[0][$i]?>-form-group form-group">
                    <label for="<?php echo $form[0][$i]?>" class="sign-up-label"><p><?php echo $form[3][$i]?></p></label>
                    <input id="<?php echo $form[0][$i]?>" type="text">
                </div>
                <?php
                }
                ?>
            </div>
            <div class="additionnal-form">
                <?php
                for($i = 0; $i < count($form) - 1; $i++) {
                ?>
                <div class="<?php echo $form[1][$i]?>-form additionnal-form-group">
                    <p><?php echo $form[2][$i]?></p>
                    <input id="<?php echo $form[1][$i]?>-yes" type="checkbox" name="<?php echo $form[1][$i]?>" value="yes">
                    <label for="<?php echo $form[1][$i]?>-yes" class="sign-up-label"><p>Oui</p></label>
                </div>
                <?php
                }
                ?>
            </div>
        </form>
    </main>
    <script src="public/script.js"></script>
</body>
