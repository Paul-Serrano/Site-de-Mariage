<?php

require "../includes/_connect.php";


try {
    $sqlGetUsers = "SELECT * FROM user";
    $reqGetUsers = $db->prepare($sqlGetUsers);
    $reqGetUsers->execute();
    $getUsers = $reqGetUsers->fetchAll();

} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : '.$e->getMessage();
}

?>