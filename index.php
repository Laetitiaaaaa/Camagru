<?php
require('models/sign_up.php');

if (isset($_POST) && isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['password'])){
    $suOk = 0;
    $login = $_POST['login'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $resLog = isLogin($login);
    $resMail = isMail($mail);
    $resPasswd = checkPasswd($password);
    if ($resLog == false && $resMail == false && $resPasswd == true){
        insert_user($login, $mail, $password);
        $suOk = 1;
    }
    else if ($resLog == true || $resMail == true || $resPasswd == false){
        if ($resLog == true){
             echo "Login already exists.</br>";
            }
        if ($resMail == true){
            echo "Mail already exists.</br>";
        }
        if ($resPasswd == false){
            echo "Bad password.</br>";
        }
    }
}

if ($suOk == 0){
    require('views/sign_up.php');
}
else{
    require('views/suOk.php');
}
?>