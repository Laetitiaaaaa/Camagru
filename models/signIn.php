<?php
include($root . '/config/database.php');

function isLogin($login){
    try{
        $conn = connexion();
        $sql = "SELECT `login` FROM `user` WHERE `login` = '{$login}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        if ($data){
            return true;
        }
        else{
            return false;
        }
    }
    catch(Exception $err){
        return 'error';
    }
}

function matchLogPass($login, $password){
    try{
        $password = hash('whirlpool', $password);
        $conn = connexion();
        $sql = "SELECT * FROM `user` WHERE `login` = '{$login}' AND `password` = '{$password}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        if ($data){
            return true;
        }
        else{
            return false;
        }
    }
    catch(Exception $err){
        return 'error';
    }
}

function match($login, $password){
    if (isLogin($login) === true){
        if (matchLogPass($login, $password) === true){
            return true;
        }
        else if (matchLogPass($login, $password) === 'error'){
            return 'error';
        }
    }
    else if(isLogin($login) === 'error'){
        return 'error';
    }
    return false;
}

function recoverMail($login){
    try{
        $conn = connexion();
        $sql = "SELECT `mail` FROM `user` WHERE `login` = '{$login}';";
        $req = $conn->query($sql);
        $conn = null;
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data[0]['mail'];
    }
    catch(PDOException $err){
        return 'error';
    }
}

?>