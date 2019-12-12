<?php
include('../config/database.php');

function isMail($mail){
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

function getUserwMail($mail){
    $conn = connexion();
    $sql = "SELECT * FROM `user` WHERE `mail` = '{$mail}';";
    $req = $conn->query($sql);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return ($data[0]);
}

function insertNum($mail, $num){
    $conn = connexion();
    $sql = "UPDATE `user` SET `num` = '{$num}' WHERE `mail` = '{$mail}';";
    $conn->query();
    $conn = null;
    var_dump("num user inserted");
}

function sendPass($mail){
    if (isMail($mail) == false){
        return false;
    }
    else{
        $num = rand(0, 1000000);
        insertNum($mail, $num);
        $user = getUserwMail($mail);
        $login = $user['login'];
        $subject = "Forgotten password";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Camagru Team <no_reply@camagru.com>"."\r\n";
        $message = "
        <h1>No worries $login!</h1>
        <p>To change your password, click <a href='http://localhost:8080/controler/change-passwd.php?log=$login&n=$num'>here</a>.</p>
        ";
        $chpass = mail($mail, $subject, $message, $headers);
        if ($chpass == true){
            var_dump("chpass envoyé");
        }
        else{
            var_dump("pb mail chpass");
        }
    }
}

?>