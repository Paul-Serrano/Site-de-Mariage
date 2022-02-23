<?php

require "dev.env.php";

$db_string = "mysql:dbname=".DATABASE.";host=".SERVER;

try {
    $db = new PDO($db_string, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $db = null;
    echo 'Erreur : ' . $e->getMessage();
}


?>