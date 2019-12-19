<?php
include('../config/database.php');

function isLogin($login){
    $conn = connexion();
    $sql = "SELECT `login` FROM `user` WHERE `login` = '{$login}';";
    $req = $conn->query($sql);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    if ($data){
        return true;
    }
    else{
        return false;
    }
}

function matchLogPass($login, $password){
    $password = hash('whirlpool', $password);
    $conn = connexion();
    $sql = "SELECT * FROM `user` WHERE `login` = '{$login}' AND `password` = '{$password}';";
    $req = $conn->query($sql);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    if ($data){
        return true;
    }
    else{
        return false;
    }
}

function match($login, $password){
    if (isLogin($login) == true){
        if (matchLogPass($login, $password) == true){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

function recoverMail($login){
    $conn = connexion();
    $sql = "SELECT `mail` FROM `user` WHERE `login` = '{$login}';";
    $req = $conn->query($sql);
    $conn = null;
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data[0]['mail'];
}

?>