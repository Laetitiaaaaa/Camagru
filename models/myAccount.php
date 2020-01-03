<?php
include($root . '/config/database.php');

function isLogin($login){
    try{
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
    catch(PDOException $err){
        return 'error';
    }
}

function isMail($mail){
    try{
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

function matchPassVerif($passwd, $verif){
    if (strcmp($passwd, $verif) == 0){
        return true;
    }
    return false;
}

function changeLog($oldLog, $newLog){
    $log = isLogin($newLog);
    if ($log === false){
        try{
            $conn = connexion();
            $sql = "UPDATE `user` SET `login` = '{$newLog}' WHERE `login` = '{$oldLog}';";
            $conn->query($sql);
            $conn = null;
            return true;
        }
        catch(PDOException $err){
            return 'error';
        }
    }
    else{
        if ($log === 'error'){
            return 'error';
        }
        return false;
    }
}

function changeMail($login, $newMail){
    $mail = isMail($newMail);
    if ($mail === false){
        try{
            $conn = connexion();
            $sql = "UPDATE `user` SET `mail` = '{$newMail}' WHERE `login` = '{$login}';";
            $conn->query($sql);
            $conn = null;
            return true;
        }
        catch(PDOException $err){
            return 'error';
        }
    }
    else{
        if ($mail === 'error'){
            return 'error';
        }
        return false;
    }
}

function changePass($login, $newPass, $verif){
    if (checkPasswd($newPass) == true){
        if (matchPassVerif($newPass, $verif) == true){
            try{
                $newPass = hash('whirlpool', $newPass);
                $conn = connexion();
                $sql = "UPDATE `user` SET `password` = '{$newPass}' WHERE `login` = '{$login}';";
                $conn->query($sql);
                $conn = null;
                return true;              
            }
            catch(PDOException $err){
                return 'error';
            }
        }
        else{
            return 'verif wrong';
        }
    }
    else{
        return 'pass wrong';
    }
}
?>