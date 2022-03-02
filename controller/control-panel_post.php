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

$getNoHousingUsers = [];

for($i = 0; $i < count($getUsers); $i++) {
    if($getUsers[$i]['housing'] == "non") {
        array_push($getNoHousingUsers, $getUsers[$i]);
    }
}

?><pre><?php

?></pre><?php

?>