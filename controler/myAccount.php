<?php 
require('../models/myAccount.php');
session_start();

if (isset($_SESSION) && isset($_SESSION['login']) && isset($_SESSION['logon'])){
    if($_SESSION['logon'] == 1){
        if (isset($_POST) && (isset($_POST['login']) && isset($_POST['changeLog']) || (isset($_POST['mail']) && isset($_POST['changeMail'])) || (isset($_POST['password']) && isset($_POST['verif']) && isset($_POST['changePass'])))){
            if (!empty($_POST['login']) && !empty($_POST['changeLog'])){
                $login = $_POST['login'];
                changeLog($_SESSION['login'], $login);
                $_SESSION['login'] = $login;
            }
            else if (!empty($_POST['mail']) && !empty($_POST['changeMail'])){
                $mail = $_POST['mail'];
                changeMail($_SESSION['login'], $mail);
                $_SESSION['mail'] = $mail;
            }
            else if (!empty($_POST['password']) && !empty($_POST['verif']) && !empty($_POST['changePass'])){
                $newPass = $_POST['password'];
                $verif = $_POST['verif'];
                changePass($_SESSION['login'], $newPass, $verif);
            }
        }
        require('../views/myAccount.php');
    }
    else{
        require('../views/notLogon.php');
    }
}
else{
    require('../views/notLogon.php');
}

?>