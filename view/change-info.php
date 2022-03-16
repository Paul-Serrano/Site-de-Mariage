<?php

require_once "../includes/_nav.php";


$alert = false;
$contactAlert = false;


if(isset($_GET['error'])) {
    if($_GET['error'] == "missingInput") {
        $alert = true;
        $type = "warning";
        $message="Veuillez changer au moins une information ou retourner vers la navigation !";
    }
    if($_GET['error'] == "wrongPass") {
        $alert = true;
        $type = "warning";
        $contactAlert = true;
        $message = "Votre mot de passe actuel n'est pas le bon, vous pouvez contacter l'administrateur pour en obtenir un nouveau. Cliquez sur le lien ci dessous";
        $contact = `<a href="../view/contact.php"><p>Formulaire de contact</p></a>`;
    }
    if($_GET['error'] == "diffPass") {
        $alert = true;
        $type = "warning";
        $message="Vous avez rentré deux nouveaux mots de passe différents, essayez une nouvelle fois !";
    }
}

?>

<body>
    <main class="change-info-main">
        <p>Remplissez les éléments que vous souhaitez modifier, entrez votre mot de passe et validez !</p>
        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'><p>{$message}</p><div class='close-alert'><img src='../public/img/close.png' alt='fermer' onclick='closeAlert()'></div></div>" : ''; ?>
        <?php echo $contactAlert ? "<a href='../view/contact.php'><p>Formulaire de contact</p></a>" : ''; ?>
        <form class="change-form" action="../controller/change-info_post.php" method="POST">
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
                    <label for="ville" class="change-label"><p>Ville</p></label>
                    <input class="change-input" id="ville" type="text" name="ville">
                </div>
                <div class="change-input-block">
                    <label for="newpass" class="change-label"><p>Nouveau mot de passe</p></label>
                    <input class="change-input" id="newpass" type="text" name="newpass">
                </div>
            </div>
            <div class="change-validation-block">
                <label for="newpass2" class="change-label"><p>Confirmation nouveau mot de passe</p></label>
                <input class="change-input" id="newpass2" type="text" name="newpass2">
                <label for="pass" class="change-label"><p>Mot de passe actuel, pour validation</p></label>
                <input class="change-input" id="pass" type="text" name="pass">
                <button type="submit" class='change-info-btn' name="change-info-btn"><p>Valider Changements</p></button>
            </div>
        </form>
    </main>
    <script src="../public/script.js"></script>
</body>