<?php

include_once "_nav.php";
require "includes/_connect.php";

$regularForm = ["name", "surname", "mail", "tel", "adress", "pass", "pass2"];
$regularFormLabel = ["Nom", "Prénom", "Adresse Mail", "Téléphone", "Adresse Postale", "Mot de Passe", "Retapez mot de passe"];
$hypotheticForm = ["housing-choice", "food-choice", "sideGuest-choice"];
$specialForm = ["housing", "sideGuest", "food"];
$choice = ["yes", "no"];
$question = ["Avez vous déjà prévu votre logement pour l'évènement ?",
"Venez vous avec une ou plusieurs personnes ne pouvant pas s'inscrire sur le site ? (enfants, personnes agées ...)",
"Avez vous des allergies ou un régime alimentaire particulier ?"

];
$form = [$regularForm, $hypotheticForm, $question, $regularFormLabel, $specialForm];
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
                    <input id="<?php echo $form[0][$i]?>" type="text" value="" name="<?php echo $form[0][$i]?>">
                </div>
                <?php
                }
                ?>
            </div>
            <div class="additionnal-form">
                <div class="<?php echo $form[1][0]?>-form additionnal-form-group">
                    <p><?php echo $form[2][0]?></p>
                    <input id="<?php echo $form[1][0]?>-yes" type="checkbox" name="<?php echo $form[1][0]?>" value="yes">
                    <label for="<?php echo $form[1][0]?>-yes" class="sign-up-label"><p>Oui</p></label>
                </div>
                <?php
                for($i = 1; $i < count($form) - 2; $i++) {
                ?>
                <div class="<?php echo $form[1][$i]?>-form additionnal-form-group">
                    <p><?php echo $form[2][$i]?></p>
                    <div class="additionnal-<?php echo $form[4][$i]?>-container-0 additionnal-<?php echo $form[4][$i]?>-container">
                        <button class="additionnal-form-btn" type="button" <?php if($i == 2){ echo 'onclick="addFood(0)"';} else{ echo 'onclick="yesSideGuest()"';}?>>
                            <p>Oui</p>
                        </button>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="submit-container">
                <div class="sign-in-link-container">
                    <div class="form-info-container">
                        <p class='form-info'>Seuls vos noms et prénoms seront visibles par les autres invités. Le reste des informations est uniquement accessible à Hugo et Noémie, ainsi qu'au développeur.</p>
                    </div>  
                    <a href="sign-in.php" class="sign-in-link"><p>Vous avez déjà un compte ? Venez vous identifier ici !</p></a>
                </div>
                <div class="submit-sign-up-container">
                    <button type="submit" name="sign-up-submit" class="sign-up-submit-btn"><p>Valider Inscription</p></button>
                </div>
            </div>
        </form>
    </main>
    <script src="public/script.js"></script>
</body>
