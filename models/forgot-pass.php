<?php
include($root . '/config/database.php');

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
    $conn = null;
    return ($data[0]);
}

function insertNum($mail, $num){
    $conn = connexion();
    $sql = "UPDATE `user` SET `num` = '{$num}' WHERE `mail` = '{$mail}';";
    $conn->query($sql);
    $conn = null;
    var_dump("num user inserted");
}

function sendPass($mail){
    if (isMail($mail) == false){
        var_dump("Error: mail doesn't exist.");
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
        <p>To change your password, click <a href='http://localhost:8080/change-pass?log=$login&n=$num'>here</a>.</p>
        ";
        $chpass = mail($mail, $subject, $message, $headers);
        return $chpass;
    }
}

?>