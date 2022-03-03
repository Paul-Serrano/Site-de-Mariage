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

$userSearch = [];

if(isset($_POST['search-user-btn']) && !empty($_POST['search-user'])) {
    for($i = 0; $i < count($getUsers); $i++) {
        if(stristr($getUsers[$i]['name'], $_POST['search-user']) != false || stristr($getUsers[$i]['surname'], $_POST['search-user']) != false) {
            array_push($userSearch, $getUsers[$i]);
        }
    }
    $getUsers = $userSearch;
    header('Location:../view/control-panel.php?page=panel');
}

?><pre><?php
// var_dump($getUsers);
// var_dump($userSearch);
// var_dump($_POST['search-user']);
// var_dump(stristr($getUsers[0]['name'], $_POST['search-user']));
// var_dump($getUsers[0]['name']);
?></pre><?php

?>