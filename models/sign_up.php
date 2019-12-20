<?php
include($root . '/config/database.php');

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

function insertNum($login, $num){
    $conn = connexion();
    $sql = "UPDATE `user_sub` SET `num` = '{$num}' WHERE `login` = '{$login}';";
    $conn->query($sql);
    $conn = null;
    var_dump("num inserted");
}

function sendConf($mail, $login){
    $num = rand(0, 1000000);
    insertNum($login, $num);
    $subject = "Confirm your account";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Camagru Team <no_reply@camagru.com>"."\r\n";
    $message = "
    <h1>Welcome to Camagru, $login!</h1>
    <p>Just one more step ... Click <a href='http://localhost:8080/confirm?log=$login&n=$num'>here</a> to confirm your account.</p>
    ";
    $conf = mail($mail, $subject, $message, $headers);
    if ($conf == true){
        var_dump("conf envoyée");
    }
    else{
        var_dump("pb mail");
    }
}

?>