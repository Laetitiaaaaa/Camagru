<?php
include($root . '/config/database.php');

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

function matchPassVerif($passwd, $verif){
    if (strcmp($passwd, $verif) == 0){
        return true;
    }
    return false;
}

function changeLog($oldLog, $newLog){
    if (isLogin($newLog) == false){
        $conn = connexion();
        $sql = "UPDATE `user` SET `login` = '{$newLog}' WHERE `login` = '{$oldLog}';";
        $conn->query($sql);
        $conn = null;
    }
    else{
        var_dump('log already exists');
    }
}

function changeMail($login, $newMail){
    if (isMail($newMail) == false){
        $conn = connexion();
        $sql = "UPDATE `user` SET `mail` = '{$newMail}' WHERE `login` = '{$login}';";
        $conn->query($sql);
        $conn = null;
    }
    else{
        var_dump('mail already exists');
    }
}

function changePass($login, $newPass, $verif){
    if (checkPasswd($newPass) == true){
        if (matchPassVerif($newPass, $verif) == true){
            $newPass = hash('whirlpool', $newPass);
            $conn = connexion();
            $sql = "UPDATE `user` SET `password` = '{$newPass}' WHERE `login` = '{$login}';";
            $conn->query($sql);
            $conn = null;
        }
        else{
            var_dump('you must right the same password as above');
        }
    }
    else{
        var_dump('passwd must contain minuscule majuscule and number and be at least 8 characters long');
    }
}
?>