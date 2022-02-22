<?php

require "_connect.php";

if(isset($_POST["submit"])) {
    try {
        $sql = "INSERT INTO user (mail)
        VALUES ('mail')";
        $req = $db->prepare($sql);
        $req->execute();
    } catch (PDOException $e) {
        $db = null;
        echo 'Erreur : '.$e->getMessage();
    }
    if($req) {
        header("Location:test.php");
    }
    
}

?>

<form method="POST">
    <button name="submit" type="submit" style="background-color:red;"><p>Button</p></button>
</form>