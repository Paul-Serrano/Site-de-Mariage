<?php

require ("../includes/_nav.php");

if(isset($_SESSION['mail'])){
    header('Location:../view/index.php?page=index');
}


$regularForm = ["name", "surname", "mail", "tel", "adress", "cp", "ville", "pass", "pass2"];
$regularFormLabel = ["Nom", "Prénom", "Adresse Mail", "Téléphone", "Adresse Postale", "Code Postal", "Ville",  "Mot de Passe", "Retapez mot de passe"];
$hypotheticForm = ["housing-choice", "food-choice", "sideGuest-choice"];
$specialForm = ["housing", "sideGuest", "food"];
$choice = ["yes", "no"];
$question = ["Avez vous déjà prévu votre logement pour l'évènement ?",
"Venez vous avec une ou plusieurs personnes ne pouvant pas s'inscrire sur le site ? (enfants, personnes agées ...)",
"Avez vous des allergies ou un régime alimentaire particulier ?"

];
$form = [$regularForm, $hypotheticForm, $question, $regularFormLabel, $specialForm];

$alert = false;

if (isset($_GET["error"])) {
    $alert = true;
    if ($_GET['error'] == "missingInput") {
        $type = "warning";
        $message = "Tous les champs princpiaux sont requis.";
    }

    if ($_GET['error'] == "differentPasswords") {
        $type = "warning";
        $message = "Veuillez rentrer le même mot de passe, deux fois.";
    }

    
    if ($_GET['error'] == "knownMail") {
        $type = "warning";
        $message = "Un compte avec cette adresse mail est déjà crée, veuillez vous connecter ou contacter l'administrateur.";
    }

    if ($_GET['error'] == "missingCode") {
        $type = "warning";
        $message = "Veuillez renseigner le code présent sur le faire-part svp";
    }

    if ($_GET['error'] == "wrongCode") {
        $type = "warning";
        $message = "Le code n'est pas valide, veuillez réessayer ou contacter directement les mariés ou le développeur";
    }

    if ($_GET['error'] == "wrongCp") {
        $type = "warning";
        $message = "Le code postal n'est pas valide !";
    }
}

if (isset($_GET['success'])) {
    $alert = true;
    $type = "success";
    $message = "You successfully signed up !";
}

?>


<body>
    <main class="sign-up-main">
        <form class="sign-up-form" action="../controller/sign-up_post.php" method="POST">
            <div class="regular-form">
                <div></div>
                <?php
                for($i = 0; $i < count($form[0]); $i++) {
                ?>
                <div class="<?php echo $form[0][$i]?>-form-group form-group">
                    <label for="<?php echo $form[0][$i]?>" class="sign-up-label"><p><?php echo $form[3][$i]?></p></label>
                    <?php 
                    if($i == 7 || $i == 8) {
                    ?>
                        <input id="<?php echo $form[0][$i]?>" type="password" value="" name="<?php echo $form[0][$i]?>">
                    <?php
                    }
                    else {
                    ?>
                        <input id="<?php echo $form[0][$i]?>" type="text" value="" name="<?php echo $form[0][$i]?>">
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
                ?>
                <div></div>
                <div class="<?php echo $form[1][0]?>-form">
                    <p><?php echo $form[2][0]?></p>
                    <input id="<?php echo $form[1][0]?>-yes" type="checkbox" name="<?php echo $form[1][0]?>" value="yes">
                    <label for="<?php echo $form[1][0]?>-yes" class="sign-up-label"><p>Oui</p></label>
                </div>                    
            </div>
            <div class="additionnal-form">
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
                <hr class="phone-hr">
                <?php
                }
                ?>
            </div>
            <hr class="phone-hr">
            <?php echo $alert ? "<div class='alert alert-{$type} mt-2'><p>{$message}</p><div><img src='../public/img/close.png' alt='fermer' onclick='closeAlert()'></div></div>" : ''; ?>
            <div class="submit-container">
                <div class="sign-in-link-container">
                    <div class="form-info-container">
                        <p class='form-info'>Seuls vos noms et prénoms seront visibles par les autres invités. Le reste des informations est uniquement accessible à Hugo et Noémie, ainsi qu'au développeur.</p>
                    </div>  
                    <a href="../view/sign-in.php?page=signIn" class="sign-in-link"><p>Vous avez déjà un compte ? Venez vous identifier ici !</p></a>
                </div>
                <div class="submit-sign-up-container">
                    <label for="code"><p>Entrez le code présent sur le faire-part</p></label>
                    <input name="code" id="code" class="code-input" type="text">
                    <button type="submit" name="sign-up-submit" class="sign-up-submit-btn"><p>Valider Inscription</p></button>
                </div>
            </div>
        </form>
    </main>
    <script src="../public/script.js"></script>
</body>
