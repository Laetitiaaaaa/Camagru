<?php
include('../config/database.php');

function matchLogNum($login, $num){
    $conn = connexion();
    $sql = "SELECT * FROM `user_sub` WHERE `login` = '{$login}' AND `num` = '{$num}'";
    $req = $conn->query($sql);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    if ($data){
        return true;
    }
    else{
        return false;
    }
}

function suppUsersub($login){
    $conn = connexion();
    $sql = "DELETE FROM `user_sub` WHERE `login` = '{$login}'";
    $conn->query($sql);
    $conn = null;
    var_dump("user sub deleted");
}

function get_user($login){
    $conn = connexion();
    $sql = "SELECT * FROM `user_sub` WHERE `login` = '{$login}'";
    $req = $conn->query($sql);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0];    
}

function addUser($login){
    $conn = connexion();
    $user = get_user($login);
    suppUsersub($login);
    $sql = "INSERT INTO `user` (`login`, `mail`, `password`) VALUES ('{$user['login']}', '{$user['mail']}', '{$user['password']}');";
    $conn->query($sql);
    var_dump("user inserted");
}

?>