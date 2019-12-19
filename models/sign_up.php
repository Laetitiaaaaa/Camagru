<?php
include('../config/database.php');

function insert_user($login, $mail, $password){
    $password = hash('whirlpool', $password);
    $conn = connexion();
    $sql = "INSERT INTO `user_sub`(`login`, `mail`, `password`) VALUES ('{$login}', '{$mail}', '{$password}')";
    $conn->query($sql);
    $conn = null;
    var_dump("user inserted !");
}

function isLogin($login){
    $conn = connexion();
    $sql = "SELECT `login` FROM `user_sub` WHERE `login` = '{$login}' UNION SELECT `login` FROM `user` WHERE `login` = '{$login}';";
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

function isMail($mail){
    $conn = connexion();
    $sql = "SELECT `mail` FROM `user_sub` WHERE `mail` = '{$mail}' UNION SELECT `mail` FROM `user` WHERE `mail` = '{$mail}';";
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

function checkPasswd($password){
    $pattern = "/[a-z]+/";
    if (preg_match($pattern, $password) == 1){
        $pattern = "/[0-9]+/";
        if (preg_match($pattern, $password) == 1){
            $pattern = "/[A-Z]+/";
            if (preg_match($pattern, $password) == 1){
                if (strlen($password) > 7){
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
        else{
            return false;
        }
    }
    else{
        return false;
    }
}

?>