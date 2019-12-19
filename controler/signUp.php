<?php
require('../models/sign_up.php');

session_start();

if (isset($_POST) && isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['password'])){
    $suOk = 0;
    if ($_POST['login'] != "" && $_POST['mail'] != "" && $_POST['password'] != ""){        
        $login = $_POST['login'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $resLog = isLogin($login);
        $resMail = isMail($mail);
        $resPasswd = checkPasswd($password);
        if ($resLog == false && $resMail == false && $resPasswd == true){
            $_SESSION['login'] = $login;
            $_SESSION['mail'] = $mail;
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
}

if ($suOk == 0){
    require('../views/sign_up.php');
}
else{
    header('Location: http://localhost:8080/controler/suOk.php');
}
?>