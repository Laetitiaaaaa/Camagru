<?php
include($root . '/config/database.php');

function isMail($mail){
    try{
        $conn = connexion();
        $sql = "SELECT `mail` FROM `user` WHERE `mail` = '{$mail}';";
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

function getUserwMail($mail){
    try{
        $conn = connexion();
        $sql = "SELECT * FROM `user` WHERE `mail` = '{$mail}';";
        $req = $conn->query($sql);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return ($data[0]);
    }
    catch(PDOException $err){
        return 'error';
    }
}

function insertNum($mail, $num){
    try{
        $conn = connexion();
        $sql = "UPDATE `user` SET `num` = '{$num}' WHERE `mail` = '{$mail}';";
        $conn->query($sql);
        $conn = null;
        return true;
    }
    catch(PDOException $err){
        return 'error';
    }
}

function sendPass($mail){
    $check = isMail($mail);
    if ($check === false){
        return 'error mail';
    }
    else if ($check === 'error'){
        return 'error';
    }
    $num = rand(0, 1000000);
    if (insertNum($mail, $num) === 'error'){
        return 'error';
    }
    $user = getUserwMail($mail);
    if ($user === 'error'){
        return 'error';
    }
    $login = $user['login'];
    $subject = "Forgotten password";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Camagru Team <no_reply@camagru.com>"."\r\n";
    $message = "
    <h1>No worries $login!</h1>
    <p>To change your password, click <a href='http://localhost:8080/change-pass?log=$login&n=$num'>here</a>.</p>
    ";
    $chpass = mail($mail, $subject, $message, $headers);
    return $chpass;
}

?>