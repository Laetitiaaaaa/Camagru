<?php
include($root . '/config/database.php');

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
    <p>Just one more step ... Click <a href='http://localhost:8080/controler/confirm.php?log=$login&n=$num'>here</a> to confirm your account.</p>
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