<?php
include('config/database.php');

function insert_user($login, $mail, $password){
    $conn = connexion();
    if ($login != "" && $mail != "" && $password != ""){
        $sql = "INSERT INTO `user`(`login`, `mail`, `password`) VALUES ('{$login}', '{$mail}', '{$password}')";
        $conn->query($sql);
        var_dump("user inserted !");
    }
    else{
        var_dump("problem with user insert");
    }
    $conn = null;
}

?>