<?php
include($root . '/config/database.php');

function matchLogNum($login, $num){
    try{
        $conn = connexion();
        $sql = "SELECT * FROM `user` WHERE `login` = '{$login}' AND `num` = '{$num}';";
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
    catch(PDOException $err){
        return 'error';
    }
}

function matchPassVerif($password, $verif){
    $diff = strcmp($password, $verif);
    if ($diff == 0){
        return true;
    }
    else{
        return false;
    }
}

function changePass($login, $password){
    try{
        $password = hash('whirlpool', $password);
        $conn = connexion();
        $sql = "UPDATE `user` SET `password` = '{$password}' WHERE `login` = '{$login}';";
        $conn->query($sql);
        $conn = null;
        return true;      
    }
    catch(PDOException $err){
        return 'error';
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
            }
        }
    }
    return false;
}

?>